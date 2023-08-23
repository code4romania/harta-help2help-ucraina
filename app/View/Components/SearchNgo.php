<?php

declare(strict_types=1);

namespace App\View\Components;

use App\Models\BeneficiaryGroup;
use App\Models\County;
use App\Models\InterventionDomain;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class SearchNgo extends Component
{
    public Collection $counties;

    public Collection $interventionDomains;

    public Collection $beneficiaries;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->counties = County::all();

        $this->interventionDomains = InterventionDomain::all();

        $this->beneficiaries = BeneficiaryGroup::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('components.search-ngo');
    }
}
