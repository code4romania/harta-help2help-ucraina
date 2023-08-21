<?php

declare(strict_types=1);

namespace App\Models;

use App\Concerns\ClearsResponseCache;
use App\Concerns\HasLocation;
use App\Concerns\Searchable;
use App\Concerns\Translatable;
use App\Helpers\Normalize;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Service extends Model
{
    use ClearsResponseCache;
    use HasFactory;
    use HasLocation;
    use Searchable;
    use Translatable;

    protected $casts = [
        'intervention_domains' => 'array',
        'activity_domains' => 'array',
        'beneficiary_groups' => 'array',
        'application_methods' => 'array',
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
        'beneficiary_groups',
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

    protected $with = ['interventionDomain', 'beneficiaryGroup', 'ngo', 'city', 'county'];

    public function toSearchableArray(): array
    {
        return [
            'id' => $this->id,
            'name' => Normalize::string($this->name),
            'project_name' => Normalize::string($this->project_name),
            'county' => Normalize::string($this->county?->name),
            'beneficiary' => Normalize::collection(
                $this->beneficiaryGroup
                    ->pluck('name')
                    ->unique()
                    ->collect()
            ),
            'interventionDomain' => Normalize::collection(
                $this->interventionDomain
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
                $query->whereRelation('interventionDomain', 'intervention_domains.id', $interventionDomain);
            })
            ->when(data_get($filters, 'beneficiary'), function (Builder $query, $beneficiary) {
                $query->whereRelation('beneficiaryGroup', 'beneficiary_groups.id', $beneficiary);
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

    public function beneficiaryGroup(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(BeneficiaryGroup::class);
    }

    public function interventionDomain(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(InterventionDomains::class);
    }

    public function getNgoNameAttribute()
    {
        return $this->ngo->name;
    }

    public function getNgoImageAttribute()
    {
        return $this->ngo->getFirstMediaUrl() ?: null;
    }
}
