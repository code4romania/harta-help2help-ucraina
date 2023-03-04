<?php

declare(strict_types=1);

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InterventionDomains extends Component
{
    /**
     * @var array|array[]
     */
    public array $domains;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->domains = $this->domains();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $domains = $this->domains();

        return view('components.intervention-domains', compact('domains'));
    }

    public function domains(): array
    {
        return [
            [
                'name' => 'health',
                'icon' => 'heroicon-o-heart',
                'url' => '#',
            ],
            [
                'name' => 'food',
                'icon' => 'heroicon-o-cake',
                'url' => '#',
            ],
            [
                'name' => 'house',
                'icon' => 'heroicon-o-home',
                'url' => '#',
            ],
            [
                'name' => 'hygiene',
                'icon' => 'heroicon-o-heart',
                'url' => '#',
            ],
            [
                'name' => 'finance_support',
                'icon' => 'heroicon-o-check',
                'url' => '#',
            ],
            [
                'name' => 'protection',
                'icon' => 'heroicon-o-shield-check',
                'url' => '#',
            ],
            [
                'name' => 'education',
                'icon' => 'heroicon-o-academic-cap',
                'url' => '#',
            ],
            [
                'name' => 'management',
                'icon' => 'heroicon-o-bookmark',
                'url' => '#',
            ],
            [
                'name' => 'integration',
                'icon' => 'heroicon-o-user-group',
                'url' => '#',
            ],

        ];
    }
}
