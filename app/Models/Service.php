<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Service extends Model
{
    use HasFactory;

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
        'start',
        'end',
        'intervention_domains',
        'activity_domains',
        'beneficiary_groups',
        'application_methods',
        'website_project',
        'budget',
    ];

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
}
