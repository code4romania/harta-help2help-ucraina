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
                'icon' => 'icon-health',
                'url' => 10,
            ],
            [
                'name' => 'food',
                'icon' => 'icon-food',
                'url' => 2,
            ],
            [
                'name' => 'house',
                'icon' => 'icon-house',
                'url' => 3,
            ],
            [
                'name' => 'hygiene',
                'icon' => 'icon-hygiene',
                'url' => 4,
            ],
            [
                'name' => 'finance_support',
                'icon' => 'icon-finance_support',
                'url' => 5,
            ],
            [
                'name' => 'protection',
                'icon' => 'icon-protection',
                'url' => 6,
            ],
            [
                'name' => 'education',
                'icon' => 'icon-education',
                'url' => 7,
            ],
            [
                'name' => 'management',
                'icon' => 'icon-management',
                'url' => 8,
            ],
            [
                'name' => 'integration',
                'icon' => 'icon-integration',
                'url' => 9,
            ],

        ];
    }
}
