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

class Ngo extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'number_of_beneficiaries',
        'phone',
        'contact_email',
        'address',
        'website',
        'social_icons',
    ];

    protected $casts = [
        'social_icons' => 'array',
        'activity_domains' => 'array',
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
