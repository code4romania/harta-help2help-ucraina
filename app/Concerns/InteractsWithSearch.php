<?php

namespace App\Concerns;

use App\Models\Ngo;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

trait InteractsWithSearch
{

    public function scopeFilter(Builder $query, Collection $filters): Builder
    {
        foreach ($filters as $key => $value) {
            if (!empty($value)) {
                if ($this->getModel() === Ngo::getModel()) {
                    $query->with('services');
                    match ($key) {
                        'search' => $query->where(function ($query) use ($value) {
                            $query->orWhere('name', 'LIKE', '%' . $value . '%');
                        }),
                        'county' => $query->where('county_id', $value),
                        default => $query,
                    };

                } else {
                    match ($key) {
                        'intervention_domain' => $query->whereJsonContains('intervention_domains', $value),
                        'beneficiary' => $query->whereJsonContains('beneficiary_groups', $value),
                        'status' => $query->where('status', $value),
                        'search' => $query->where(function ($query) use ($value) {
                            $query->orWhere('name', 'LIKE', '%' . $value . '%');
                            $query->orWhere('project_name', 'LIKE', '%' . $value . '%');
                        }),
                        'county' => $query->where('county_id', $value),
                        default => $query,
                    };
                }
            }
        }

        return $query;
    }
}
