<?php

namespace App\Filament\Resources;

use App\Filament\Components\TextInput;
use App\Filament\Resources\ContactUsResource\Pages\ListContactUs;
use App\Helpers\BaseExport;
use App\Helpers\HasForm;
use App\Models\ContactUs;
use BezhanSalleh\FilamentShield\Contracts\HasShieldPermissions;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;

class ContactUsResource extends Resource implements HasShieldPermissions
{
    use HasForm, Translatable;

    protected static ?string $model = ContactUs::class;


    protected static ?string $navigationIcon = 'fas-city';


    public static function getNavigationLabel(): string
    {
        return __("Contact Us Forms");
    }

    public static function getModelLabel(): string
    {
        return __("Contact Us Form");
    }

    public static function getPluralLabel(): ?string
    {
        return __("Contact Us Forms");
    }

    public static function getPluralModelLabel(): string
    {
        return __("Contact Us Forms");
    }

    public static function getNavigationGroup(): ?string
    {
        return __("Forms");
    }

    public static function getNavigationBadge(): ?string
    {
        return self::$model::count();
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->query(function (){
                return self::$model::orderBy('created_at', 'desc');
            })
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->toggleable()
                    ->searchable()
                    ->label(__("Name")),
                Tables\Columns\TextColumn::make('company_name')
                    ->toggleable()
                    ->searchable()
                    ->label(__("company_name")),
                Tables\Columns\TextColumn::make("email")
                    ->searchable()
                    ->label(__("Email"))
                    ->toggleable(),
                Tables\Columns\TextColumn::make("phone")
                    ->searchable()
                    ->toggleable()
                    ->label(__("Phone")),
                Tables\Columns\TextColumn::make("case_name")
                    ->searchable()
                    ->toggleable()
                    ->label(__("Case Name")),
                Tables\Columns\TextColumn::make("created_at")
                    ->label(__("Created At"))
                    ->toggleable()
                    ->since()
            ])
            ->filters([
            ])
            ->actions([
                Tables\Actions\Action::make('attachment')
                    ->label(__('Attachment'))
                    ->url(function ($record){
                        return $record->attachment;
                    })
                    ->hidden(function ($record){
                        return !$record->attachment;
                    }),
                Tables\Actions\Action::make('Message')
                    ->label(__("Message"))
                    ->modalHeading(function($record){
                        return "{$record->name} " . __("Message");
                    })
                    ->modalContent(function ($record){
                        return view('filament.Contact Us.Message', ['record' => $record]);
                    })
                    ->hidden(function ($record){
                        return !$record->case_description;
                    })
                    ->modalSubmitAction(false)
                    ->modalCancelAction(false),
                Tables\Actions\DeleteAction::make()
            ])
            ->poll('30s')
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    ExportBulkAction::make('Export')->label(__('Export'))->exports([
                        BaseExport::make()->fromModel()
                    ]),
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
            'index' => ListContactUs::route('/'),
        ];
    }

    public static function canCreate(): bool
    {
        return False;
    }

    public static function canEdit(Model $record): bool
    {
        return False;
    }
}
