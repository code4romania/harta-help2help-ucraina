<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ServiceController extends Controller
{
    public function map(Request $request): View
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

    public function list(Request $request): View
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
