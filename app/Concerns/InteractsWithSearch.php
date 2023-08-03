<?php

declare(strict_types=1);

namespace App\Concerns;

use App\Models\Ngo;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

trait InteractsWithSearch
{
    public function scopeFilter(Builder $query, Collection $filters): Builder
    {
        foreach ($filters as $key => $value) {
            if (! empty($value)) {
                if ($this->getModel() === Ngo::getModel()) {
                    $query->with('services');
                    match ($key) {
                        'search' => $query->where(function ($query) use ($value) {
                            $query->orWhere('name', 'LIKE', '%' . $value . '%');
                            $query->orWhere(function ($q) use ($value) {
                                $q->whereHas('services', function ($q1) use ($value) {
                                    $q1->whereHas('interventionDomain', function ($q3) use ($value) {
                                        $q3->where('intervention_domains.name', 'LIKE', '%' . $value . '%');
                                    });
                                });
                            });
                        }),
                        'county' => $query->where('county_id', $value),
                        'intervention_domain' => $query->whereHas('services', function ($query) use ($value) {
                            $query->whereHas('interventionDomain', function ($query) use ($value) {
                                $query->where('intervention_domains.id', $value);
                            });
                        }),
                        'beneficiary' => $query->whereHas('services', function ($query) use ($value) {
                            $query->whereHas('beneficiaryGroup', function ($query) use ($value) {
                                $query->where('beneficiary_groups.id', $value);
                            });
                        }),
                        'status' => $query->whereHas('services', function ($query) use ($value) {
                            $query->where('status', $value);
                        }),
                        default => $query,
                    };
                } else {
                    match ($key) {
                        'intervention_domain' => $query->whereHas('interventionDomain', function ($query) use ($value) {
                            $query->where('intervention_domains.id', $value);
                        }),
                        'beneficiary' => $query->whereHas('beneficiaryGroup', function ($query) use ($value) {
                            $query->where('beneficiary_groups.id', $value);
                        }),
                        'status' => $query->where('status', $value),
                        'search' => $query->where(function ($query) use ($value) {
                            $query->orWhere('name', 'LIKE', '%' . $value . '%');
                            $query->orWhere('project_name', 'LIKE', '%' . $value . '%');
                            $query->orWhere(function ($q) use ($value) {
                                $q->whereHas('interventionDomain', function ($q1) use ($value) {
                                    $q1->where('intervention_domains.name', 'LIKE', '%' . $value . '%');
                                });
                            });
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
