<?php

declare(strict_types=1);

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class Header extends Component
{
    public Collection $languages;

    public array $menu;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->languages = app('languages');

        $this->menu = [
            [
                'name' => __('txt.header.home'),
                'url' => localized_route('home'),
            ],
            [
                'name' => __('txt.header.about_project'),
                'url' => localized_route('page', ['page' => 'about']),
            ],
            [
                'name' => __('txt.header.services_map'),
                'url' => localized_route('services'),
            ],
            [
                'name' => __('txt.header.ngos'),
                'url' => localized_route('ngos.index'),
            ],
            [
                'name' => __('txt.header.contact'),
                'url' => localized_route('page', ['page' => 'contact']),
            ],
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.header');
    }
}
