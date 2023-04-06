<?php

declare(strict_types=1);

namespace App\View\Components;

use App\Models\BeneficiaryGroup;
use App\Models\County;
use App\Models\InterventionDomains;
use App\Models\Ngo;
use App\Models\Service;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Search extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $totalServices = Service::count();
        $totalNgos = Ngo::count();
        $counties = County::all();
        $interventionsDomains = InterventionDomains::all();
        $beneficiaries = BeneficiaryGroup::all();

        return view('components.search', compact('totalNgos', 'totalServices', 'counties', 'interventionsDomains', 'beneficiaries'));
    }
}
