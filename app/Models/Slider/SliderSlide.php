<?php

namespace App\Models\Slider;

use App\Filament\Helpers\Translatable;
use App\Helpers\HasAuthor;
use App\Helpers\HasMedia;
use App\Helpers\HasSlug;
use App\Helpers\HasStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;

/**
 * App\Models\Slider\SliderSlide
 *
 * @property int $id
 * @property int $user_id
 * @property int $slider_id
 * @property int|null $image_id
 * @property string|null $link
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $mobile_image_id
 * @property-read \App\Models\User $author
 * @property-read \Awcodes\Curator\Models\Media|null $image
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|SliderSlide active()
 * @method static \Illuminate\Database\Eloquent\Builder|SliderSlide newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SliderSlide newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SliderSlide query()
 * @method static \Illuminate\Database\Eloquent\Builder|SliderSlide whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SliderSlide whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SliderSlide whereImageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SliderSlide whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SliderSlide whereMobileImageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SliderSlide whereSliderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SliderSlide whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SliderSlide whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SliderSlide whereUserId($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \OwenIt\Auditing\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \App\Models\Slider\SliderSlideLang|null $translation
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Slider\SliderSlideLang> $translations
 * @property-read int|null $translations_count
 * @method static \Illuminate\Database\Eloquent\Builder|SliderSlide listsTranslations(string $translationField)
 * @method static \Illuminate\Database\Eloquent\Builder|SliderSlide notTranslatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|SliderSlide orWhereTranslation(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|SliderSlide orWhereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|SliderSlide orderByTranslation(string $translationField, string $sortMethod = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|SliderSlide translated()
 * @method static \Illuminate\Database\Eloquent\Builder|SliderSlide translatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|SliderSlide translations()
 * @method static \Illuminate\Database\Eloquent\Builder|SliderSlide whereTranslation(string $translationField, $value, ?string $locale = null, string $method = 'whereHas', string $operator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder|SliderSlide whereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|SliderSlide withTranslation(?string $locale = null)
 * @mixin \Eloquent
 */
class SliderSlide extends Model implements \OwenIt\Auditing\Contracts\Auditable
{
    use HasFactory, HasAuthor, Auditable, HasStatus, HasMedia, Translatable, \App\Helpers\HasTranslations;

    public $translationModel = SliderSlideLang::class;

    public array $translatedAttributes = [
        'title', 'content'
    ];

    protected $guarded = [
        'id', 'created_at', 'updated_at',
    ];
}
