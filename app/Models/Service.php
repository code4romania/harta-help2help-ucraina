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
        'target_groups' => 'array',
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
        'target_groups',
        'application_methods',
        'website_project',
        'budget'
    ];

    public function ngo(): BelongsTo
    {
        return $this->belongsTo(Ngo::class);
    }

    public function activityDomain(): HasManyThrough
    {
        return $this->hasManyThrough(ActivityDomain::class, ActivityDomainService::class);
    }
}
