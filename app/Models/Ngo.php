<?php

declare(strict_types=1);

namespace App\Models;

use App\Concerns\ClearsResponseCache;
use App\Concerns\HasLocation;
use App\Concerns\InteractsWithSearch;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Translatable\HasTranslations;

class Ngo extends Model implements HasMedia
{
    use ClearsResponseCache;
    use HasFactory;
    use InteractsWithMedia;
    use HasTranslations;
    use HasLocation;
    use InteractsWithSearch;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'number_of_beneficiaries',
        'phone',
        'contact_email',
        'activity_domains',
        'address',
        'website',
        'social_icons',
        'story',
    ];

    protected $casts = [
        'social_icons' => 'array',
        'activity_domains' => 'array',
    ];

    protected $translatable = [
        'name',
        'description',
    ];
    protected $with = ['city', 'county', 'media'];

    protected $hidden = ['description'];

    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('thumb')
            ->fit(Manipulations::FIT_CROP, 300, 300)
            ->nonQueued();
    }

    public function services(): HasMany
    {
        return $this->hasMany(Service::class);
    }

    public function interventionDomain(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(InterventionDomains::class);
    }

    public function getActivityDomainsNameAttribute(): \Illuminate\Support\Collection
    {
        return ActivityDomain::whereIn('id', $this->activity_domains)->pluck('name', 'id');
    }
    public function getInterventionDomainsNameAttribute(): \Illuminate\Support\Collection
    {

        return $this->services()->with('interventionDomain')->get()->pluck('interventionDomain')->flatten()->pluck('name', 'id');
    }
}
