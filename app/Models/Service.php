<?php

declare(strict_types=1);

namespace App\Models;

use App\Concerns\BelongsToInterventionDomains;
use App\Concerns\HasLocation;
use App\Concerns\Searchable;
use App\Concerns\Translatable;
use App\Helpers\Normalize;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Service extends Model
{
    use BelongsToInterventionDomains;
    use HasFactory;
    use HasLocation;
    use Searchable;
    use Translatable;

    protected $casts = [
        'activity_domains' => 'array',
        'application_methods' => 'collection',
    ];

    protected $fillable = [
        'name',
        'description',
        'slug',
        'ngo_id',
        'project_name',
        'intervention_domains',
        'activity_domains',
        'duration',
        'status',
        'application_methods',
        'budget',
        'lat',
        'lng',
    ];

    public $translatable = [
        'name',
        'description',
        'project_name',
    ];

    protected $with = [
        'interventionDomains',
        'beneficiaryGroups',
        'ngo',
        'city',
        'county',
    ];

    public function toSearchableArray(): array
    {
        return [
            'id' => $this->id,
            'name' => Normalize::string($this->name),
            'project_name' => Normalize::string($this->project_name),
            'county' => Normalize::string($this->county?->name),
            'beneficiaries' => Normalize::collection(
                $this->beneficiaryGroups
                    ->pluck('name')
                    ->unique()
                    ->collect()
            ),
            'interventionDomains' => Normalize::collection(
                $this->interventionDomains
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
                $query->whereRelation('interventionDomains', 'intervention_domains.id', $interventionDomain);
            })
            ->when(data_get($filters, 'beneficiary'), function (Builder $query, $beneficiary) {
                $query->whereRelation('beneficiaryGroups', 'beneficiary_groups.id', $beneficiary);
            })
            ->when(data_get($filters, 'status'), function (Builder $query, $status) {
                $query->where('status', $status);
            });
    }

    public function ngo(): BelongsTo
    {
        return $this->belongsTo(Ngo::class);
    }

    public function activityDomain(): HasManyThrough
    {
        return $this->hasManyThrough(ActivityDomain::class, ActivityDomainService::class);
    }

    public function beneficiaryGroups(): BelongsToMany
    {
        return $this->belongsToMany(BeneficiaryGroup::class);
    }

    public function getNgoNameAttribute()
    {
        return $this->ngo->name;
    }

    public function getNgoImageAttribute()
    {
        return $this->ngo->getFirstMediaUrl() ?: null;
    }

    public function getBeneficiaryGroupsListAttribute(): string
    {
        return $this->beneficiaryGroups
            ->pluck('name')
            ->join(', ');
    }

    public function getInterventionDomainsListAttribute(): string
    {
        return $this->interventionDomains
            ->pluck('name')
            ->join(', ');
    }

    public function isActive(): bool
    {
        return $this->status === 'active';
    }
}
