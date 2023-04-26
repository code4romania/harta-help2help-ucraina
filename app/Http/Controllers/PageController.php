<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Ngo;
use App\Models\Service;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function ngosPage()
    {
        $ngos = Ngo::query()->paginate(6);

        return view('ngos', compact('ngos'));
    }

    public function ngoPage(string $local, string $slug)
    {
        $ngo = Ngo::query()->where('slug', $slug)->with(['city', 'county'])->firstOrFail();

        return view('ngos_index', compact('ngo'));
    }

    public function services(Request $request)
    {
        $services = Service::query()->filter(collect($request->all()))->with(['city', 'county'])->paginate();
        $servicesJson = Service::query()->with(['city', 'county'])->get();

        return view('services', compact('services', 'servicesJson'));
    }

    public function home()
    {
        $totalServices = Service::count();
        $totalNgos = Ngo::count();
        $totalBeneficiaries = Ngo::sum('number_of_beneficiaries');

        return view('home', compact('totalNgos', 'totalServices', 'totalBeneficiaries'));
    }
}
