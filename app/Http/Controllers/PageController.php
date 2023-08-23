<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Ngo;
use App\Models\Service;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function ngosPage(Request $request)
    {
        $attributes = $request->validate([
            'search' => ['nullable', 'string'],
            'filter.county' => ['nullable', 'exists:counties,id'],
            'filter.intervention_domain' => ['nullable', 'exists:intervention_domains,id'],
            'filter.beneficiary' => ['nullable', 'exists:beneficiary_groups,id'],
        ]);

        return view('ngos', [
            'ngos' => Ngo::searchAndFilter(
                data_get($attributes, 'search'),
                data_get($attributes, 'filter'),
            )->paginate(6),
        ]);
    }

    public function ngoPage(string $local, Ngo $ngo)
    {
        return view('ngos_index', [
            'ngo' => $ngo,
            'breadcrumbs' => [
                [
                    'name' => __('txt.header.ngos'),
                    'url' => route('ngos', app()->getLocale()),
                ],
                [
                    'name' => $ngo->name,
                ],
            ],
        ]);
    }

    public function services(Request $request)
    {
        $attributes = $request->validate([
            'search' => ['nullable', 'string'],
            'filter.county' => ['nullable', 'exists:counties,id'],
            'filter.intervention_domain' => ['nullable', 'exists:intervention_domains,id'],
            'filter.beneficiary' => ['nullable', 'exists:beneficiary_groups,id'],
            'filter.status' => ['nullable', 'string', 'in:active,finished'],
        ]);

        return view('services', [
            'view' => 'map',
            'services' => Service::searchAndFilter(
                data_get($attributes, 'search'),
                data_get($attributes, 'filter'),
            )->get(),
        ]);
    }

    public function servicesList(Request $request)
    {
        $attributes = $request->validate([
            'search' => ['nullable', 'string'],
            'filter.county' => ['nullable', 'exists:counties,id'],
            'filter.intervention_domain' => ['nullable', 'exists:intervention_domains,id'],
            'filter.beneficiary' => ['nullable', 'exists:beneficiary_groups,id'],
            'filter.status' => ['nullable', 'string', 'in:active,finished'],
        ]);

        return view('services', [
            'view' => 'list',
            'services' => Service::searchAndFilter(
                data_get($attributes, 'search'),
                data_get($attributes, 'filter'),
            )->paginate(),
        ]);
    }
}
