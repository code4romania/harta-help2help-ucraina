<?php

declare(strict_types=1);

namespace App\Models;

use App\Concerns\BelongsToInterventionDomains;
use App\Concerns\ClearsResponseCache;
use App\Concerns\HasLocation;
use App\Concerns\Searchable;
use App\Concerns\Translatable;
use App\Helpers\Normalize;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Ngo extends Model implements HasMedia
{
    use ClearsResponseCache;
    use BelongsToInterventionDomains;
    use HasFactory;
    use InteractsWithMedia;
    use HasLocation;
    use Searchable;
    use Translatable;

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

    protected function makeAllSearchableUsing(Builder $query): Builder
    {
        return $query->with('services');
    }

    public function toSearchableArray(): array
    {
        return [
            'id' => $this->id,
            'name' => Normalize::string($this->name),
            'description' => Normalize::string($this->description),
            'county' => Normalize::string($this->county?->name),
            'beneficiary' => Normalize::collection(
                $this->services
                    ->pluck('beneficiaryGroup')
                    ->flatMap
                    ->pluck('name')
                    ->unique()
                    ->collect()
            ),
            'interventionDomains' => Normalize::collection(
                $this->services
                    ->pluck('interventionDomains')
                    ->flatMap
                    ->pluck('name')
                    ->unique()
                    ->collect()
            ),
        ];
    }

    public function scopeFilterQuery(Builder $query, array $filters): Builder
    {
        return $query
            ->when(data_get($filters, 'county'), function (Builder $query, $county) {
                $query->where('county_id', $county);
            })
            ->when(data_get($filters, 'intervention_domain'), function (Builder $query, $interventionDomain) {
                $query->whereRelation('services.interventionDomains', 'intervention_domains.id', $interventionDomain);
            })
            ->when(data_get($filters, 'beneficiary'), function (Builder $query, $beneficiary) {
                $query->whereRelation('services.beneficiaryGroup', 'beneficiary_groups.id', $beneficiary);
            });
    }

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

    public function getActivityDomainsNameAttribute(): Collection
    {
        return ActivityDomain::whereIn('id', $this->activity_domains)->pluck('name', 'id');
    }

    public function getInterventionDomainsListAttribute(): string
    {
        return $this->services
            ->pluck('interventionDomains')
            ->flatten()
            ->pluck('name', 'id')
            ->join(', ');
    }
}
