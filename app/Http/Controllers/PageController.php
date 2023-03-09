<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Ngo;

class PageController extends Controller
{
    public function ngosPage()
    {
        $ngos = Ngo::query()->paginate(6);

        return view('ngos', compact('ngos'));
    }

    public function ngoPage(string $slug)
    {
        $ngo = Ngo::query()->where('slug', $slug)->firstOrFail();

        return view('ngos_index', compact('ngo'));
    }
}
