<?php

namespace App\Filament\Resources;

use App\Filament\Components\FileUpload;
use App\Filament\Components\TextInput;
use App\Filament\Components\TinyEditor;
use App\Filament\Resources\ServiceResource\Pages;
use App\Filament\Resources\ServiceResource\RelationManagers;
use App\Helpers\Utilities;
use App\Models\Service;
use CactusGalaxy\FilamentAstrotomic\Forms\Components\TranslatableTabs;
use CactusGalaxy\FilamentAstrotomic\Resources\Concerns\ResourceTranslatable;
use CactusGalaxy\FilamentAstrotomic\TranslatableTab;
use Carbon\Carbon;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use FilamentTiptapEditor\TiptapEditor;

class ServiceResource extends Resource
{
    use ResourceTranslatable;

    protected static ?string $model = Service\Service::class;

    protected static ?string $navigationIcon = 'bi-question';

    protected static ?int $navigationSort = 1;

    public static function getNavigationLabel(): string
    {
        return __("Services");
    }

    public static function getModelLabel(): string
    {
        return __("Service");
    }

    public static function getPluralLabel(): ?string
    {
        return __("Services");
    }

    public static function getPluralModelLabel(): string
    {
        return __("Services");
    }

    public static function getNavigationGroup(): ?string
    {
        return __("Custom Modules");
    }

    public static function getNavigationBadge(): ?string
    {
        return self::$model::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(3)->schema([
                    Forms\Components\Grid::make()->schema([
                        TranslatableTabs::make()
                            ->localeTabSchema(fn (TranslatableTab $tab) =>[
                                FileUpload::make('image_id')
                                    ->multiple(false)
                                    ->required()
                                    ->label(__("Image")),

                                TextInput::make($tab->makeName('title'))
                                    ->label(__("Title"))
                                    ->maxLength(255)
                                    ->required(),

                                TextInput::make($tab->makeName('second_title'))
                                    ->label(__("Second Title"))
                                    ->maxLength(255)
                                    ->multiLingual(),

                                TiptapEditor::make($tab->makeName('description'))
                                    ->label(__("Description")),

                                TinyEditor::make($tab->makeName('content'))
                                    ->label(__("Content"))
                            ])->columnSpanFull(),

                    ])->columnSpan(2),

                    Forms\Components\Grid::make(1)->schema([
                        Forms\Components\Section::make()->schema(
                            array_merge(
                                Filament::auth()->user()->can('change_author_service') ? [
                                    Forms\Components\Select::make('author.name')
                                        ->label(__("Author"))
                                        ->relationship('author', 'name')
                                        ->default(Filament::auth()->user()->id)
                                        ->required()
                                        ->native(false)
                                ] : [] , [
                                TextInput::make('slug')
                                    ->label(__("Slug"))
                                    ->unique(ignoreRecord: true)
                                    ->disabledOn('edit')
                                    ->helperText(__("Will Be Auto Generated From Title"))
                                    ->markAsRequired('true'),

                                Forms\Components\DatePicker::make('published_at')
                                    ->label(__("Published At"))
                                    ->default(Carbon::today())
                                    ->native(false)
                                    ->required(),
                                Forms\Components\Select::make('status')
                                    ->label(__("Status"))
                                    ->options(Service\Service::getStatuses())
                                    ->native(false)
                                    ->default(1),
                            ])
                        ),
                        \App\Filament\Components\Seo::make(config('app.locales'))
                            ->columnSpan(1)
                    ])->columnSpan(1),

                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->query(function(){
                return self::$model::orderBy('published_at', 'desc');
            })
            ->columns([
                Tables\Columns\TextColumn::make('translation.title')
                    ->toggleable()
                    ->searchable(query: function ($query, $search){
                        return $query->whereTranslationLike('title', '%'.$search.'%');
                    })
                    ->label(__("Title")),
                Tables\Columns\TextColumn::make('status')
                    ->toggleable()
                    ->label(__("Status"))
                    ->badge()
                    ->color(function (Service\Service $record){
                        return $record->status == Utilities::PUBLISHED ? "success" : "danger";
                    })
                    ->formatStateUsing(function(Service\Service $record){
                        return $record->status == Utilities::PUBLISHED ? __("Published") : __("Pending");
                    }),
                Tables\Columns\TextColumn::make('published_at')
                    ->toggleable()
                    ->label(__("Publish Time"))
                    ->date(),
                Tables\Columns\TextColumn::make('author.name')
                    ->toggleable()
                    ->label(__("Author"))
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('author')
                    ->label(__("Author"))
                    ->searchable()
                    ->relationship('author', 'name')
                    ->native(false),
                Tables\Filters\SelectFilter::make('status')
                    ->label(__("Status"))
                    ->options(Service\Service::getStatuses())
                    ->searchable()
                    ->native(false)
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
            ])
            ->poll("30s")
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
//                    ExportBulkAction::make('Export')->label(__('Export'))->exports([
//                        PageExport::make()->fromModel()
//                    ]),
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }
}
