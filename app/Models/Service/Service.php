<?php

namespace App\Models\Service;

use App\Filament\Helpers\Translatable;
use App\Helpers\HasAuthor;
use App\Helpers\HasMedia;
use App\Helpers\HasSeo;
use App\Helpers\HasSlug;
use App\Helpers\HasStatus;
use App\Helpers\HasTimestamps;
use App\Models\Dropdown\Dropdown;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * App\Models\Service\Service
 *
 * @property int $id
 * @property int $user_id
 * @property int|null $image_id
 * @property int $weight
 * @property string $slug
 * @property int $status
 * @property string|null $published_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \OwenIt\Auditing\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \App\Models\User $author
 * @property-read \Awcodes\Curator\Models\Media|null $media
 * @property-read \App\Models\Seo\Seo $seo
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Service\ServiceStep> $steps
 * @property-read int|null $steps_count
 * @property-read \App\Models\Service\ServiceLang|null $translation
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Service\ServiceLang> $translations
 * @property-read int|null $translations_count
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Service active()
 * @method static \Illuminate\Database\Eloquent\Builder|Service listsTranslations(string $translationField)
 * @method static \Illuminate\Database\Eloquent\Builder|Service newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Service newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Service notTranslatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Service orWhereTranslation(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Service orWhereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Service orderByTranslation(string $translationField, string $sortMethod = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|Service query()
 * @method static \Illuminate\Database\Eloquent\Builder|Service translated()
 * @method static \Illuminate\Database\Eloquent\Builder|Service translatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Service translations()
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereImageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service wherePublishedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereTranslation(string $translationField, $value, ?string $locale = null, string $method = 'whereHas', string $operator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereWeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service withTranslation(?string $locale = null)
 * @mixin \Eloquent
 */
class Service extends Model implements Auditable
{
    use HasFactory, HasStatus, HasAuthor, \OwenIt\Auditing\Auditable, \App\Helpers\HasTranslations, Translatable, HasTimestamps, HasMedia, HasSlug, HasSeo;

    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];

    public $translationModel = ServiceLang::class;

    public array $translatedAttributes = [
        'title', 'second_title', 'description', 'content'
    ];

    public function category(){
        return $this->belongsTo(Dropdown::class, 'dropdown_id', 'id');
    }
}
