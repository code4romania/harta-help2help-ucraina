<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\InterventionDomain;
use App\Models\Ngo;
use App\Models\Service;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __invoke(): View
    {
        return view('home', [
            'services_count' => Service::count(),
            'ngos_count' => Ngo::count(),
            'beneficiaries_count' => Ngo::sum('number_of_beneficiaries'),
            'domains' => InterventionDomain::all(),
        ]);
    }
}
