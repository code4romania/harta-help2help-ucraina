<?php

declare(strict_types=1);

namespace App\Models;

use App\Concerns\HasLocation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
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
        'lng'
    ];

    public $translatable = [
        'name',
        'description',
        'project_name',
        'application_methods',
    ];

    public $appends = ['interventions_domains_name','beneficiary_groups_name'];

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
}
