<?php

declare(strict_types=1);

namespace App\View\Components;

use App\Models\BeneficiaryGroup;
use App\Models\County;
use App\Models\InterventionDomains;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ActiveFilters extends Component
{
    public array $filters = [
        'search',
        'county',
        'intervention_domain',
        'beneficiary',
        'status',
    ];

    public array $activeFilters = [];

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->activeFilters = collect($this->filters)
            ->reject(fn (string $filter) => ! request()->query($filter))
            ->mapWithKeys(fn (string $filter) => [
                __("txt.filters.label.{$filter}") => match ($filter) {
                    'county' => $this->getCountyFilter(),
                    'intervention_domain' => $this->getInterventionDomainFilter(),
                    'beneficiary' => $this->getBeneficiaryFilter(),
                    'status' => $this->getStatusFilter(),
                    default => request()->query($filter),
                },
            ])
            ->filter()
            ->all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('components.active-filters');
    }

    public function shouldRender(): bool
    {
        return collect(request()->query())
            ->hasAny($this->filters);
    }

    protected function getCountyFilter(): ?string
    {
        return County::where('id', request()->query('county'))->first()?->name;
    }

    protected function getInterventionDomainFilter(): ?string
    {
        return InterventionDomains::where('id', request()->query('intervention_domain'))->first()?->name;
    }

    protected function getBeneficiaryFilter(): ?string
    {
        return BeneficiaryGroup::where('id', request()->query('beneficiary'))->first()?->name;
    }

    protected function getStatusFilter(): ?string
    {
        return match (request()->query('status')) {
            'active' => __('txt.service_card.project_active'),
            'finished' => __('txt.service_card.project_finished'),
            default => null,
        };
    }
}
