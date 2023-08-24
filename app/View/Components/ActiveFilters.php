<?php

declare(strict_types=1);

namespace App\View\Components;

use App\Models\BeneficiaryGroup;
use App\Models\County;
use App\Models\InterventionDomain;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ActiveFilters extends Component
{
    public array $filters = [
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
        if (request()->get('search')) {
            $this->activeFilters['search'] = request()->get('search');
        }

        $this->activeFilters = array_merge(
            $this->activeFilters,
            collect($this->filters)
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
                ->all()
        );
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
        return collect([
            request()->get('search'),
            ...request()->get('filter', []),
        ])
            ->filter()
            ->isNotEmpty();
    }

    protected function getCountyFilter(): ?string
    {
        return County::where('id', request()->integer('filter.county'))->first()?->name;
    }

    protected function getInterventionDomainFilter(): ?string
    {
        return InterventionDomain::where('id', request()->integer('filter.intervention_domain'))->first()?->name;
    }

    protected function getBeneficiaryFilter(): ?string
    {
        return BeneficiaryGroup::where('id', request()->integer('filter.beneficiary'))->first()?->name;
    }

    protected function getStatusFilter(): ?string
    {
        return match (request()->input('filter.status')) {
            'active' => __('txt.service_card.project_active'),
            'finished' => __('txt.service_card.project_finished'),
            default => null,
        };
    }
}
