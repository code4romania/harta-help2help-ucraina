<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class PageController extends Controller
{
    public function __invoke(string $locale, string $page, Request $request): View
    {
        $view = "pages.$page";

        abort_unless(view()->exists($view), 404);

        return view($view);
    }
}
