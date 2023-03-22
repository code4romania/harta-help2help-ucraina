<?php

declare(strict_types=1);

namespace App\Models;

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
    use HasFactory;
    use InteractsWithMedia;
    use HasTranslations;

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

    protected $appends = ['intervention_domains'];

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

    public function getInterventionDomainsAttribute(): \Illuminate\Support\Collection
    {
        $interventionDomains = [];
        foreach ($this->services as $service) {
            $interventionDomains = array_merge($interventionDomains, $service->intervention_domains);
        }

        return InterventionDomains::whereIn('id', $interventionDomains)->pluck('name', 'id');
    }

    public function getActivityDomainsNameAttribute(): \Illuminate\Support\Collection
    {
        return ActivityDomain::whereIn('id', $this->activity_domains)->pluck('name', 'id');
    }
}
