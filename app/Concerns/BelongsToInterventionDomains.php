<?php

declare(strict_types=1);

namespace App\Concerns;

use App\Models\InterventionDomain;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait BelongsToInterventionDomains
{
    public function interventionDomains(): BelongsToMany
    {
        return $this->belongsToMany(InterventionDomain::class);
    }
}
