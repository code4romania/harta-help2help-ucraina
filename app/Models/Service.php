<?php

declare(strict_types=1);

namespace App\Models;

use App\Concerns\HasLocation;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Support\Collection;
use Spatie\Translatable\HasTranslations;

class Service extends Model
{
    use HasFactory;
    use HasTranslations;
    use HasLocation;

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

    public $appends = ['interventions_domains_name', 'beneficiary_groups_name'];

    public function ngo(): BelongsTo
    {
        return $this->belongsTo(Ngo::class);
    }

    public function activityDomain(): HasManyThrough
    {
        return $this->hasManyThrough(ActivityDomain::class, ActivityDomainService::class);
    }

    public function getBeneficiaryGroupsNameAttribute()
    {
        return BeneficiaryGroup::whereIn('id', $this->beneficiary_groups)->pluck('name', 'id');
    }

    public function getInterventionsDomainsNameAttribute()
    {
        return InterventionDomains::whereIn('id', $this->intervention_domains)->pluck('name', 'id');
    }

    public function getNgoNameAttribute()
    {
        return $this->ngo->name;
    }

    public function getNgoImageAttribute()
    {
        return $this->ngo->getFirstMediaUrl() ?: null;
    }

    public function scopeFilter(Builder $query, Collection $filters): Builder
    {
        foreach ($filters as $key => $value) {
            if (!empty($value)) {
                match ($key) {
                    'intervention_domain' => $query->whereJsonContains('intervention_domains', $value),
                    'beneficiary' => $query->whereJsonContains('beneficiary_groups', $value),
                    'status' => $query->where('status', $value),
                    'search' => $query->where(function ($query) use ($value) {
                        $query->where('project_name', 'LIKE', '%' . $value . '%');
                        $query->orWhere('name', 'LIKE', '%' . $value . '%');
                    }),
                    'county' => $query->where('county_id', $value),
                    'default' => $query,
                };
            }
        }
        return $query;
    }
}
