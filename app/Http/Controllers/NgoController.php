<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Ngo;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NgoController extends Controller
{
    public function index(Request $request): View
    {
        $attributes = $request->validate([
            'search' => ['nullable', 'string'],
            'filter.county' => ['nullable', 'exists:counties,id'],
            'filter.intervention_domain' => ['nullable', 'exists:intervention_domains,id'],
            'filter.beneficiary' => ['nullable', 'exists:beneficiary_groups,id'],
        ]);

        return view('ngos.index', [
            'ngos' => Ngo::searchAndFilter(
                data_get($attributes, 'search'),
                data_get($attributes, 'filter'),
            )->paginate(6),
        ]);
    }

    public function show(string $locale, Ngo $ngo): View
    {
        return view('ngos.show', [
            'ngo' => $ngo,
            'breadcrumbs' => [
                [
                    'name' => __('txt.header.ngos'),
                    'url' => localized_route('ngos.index'),
                ],
                [
                    'name' => $ngo->name,
                ],
            ],
        ]);
    }
}
