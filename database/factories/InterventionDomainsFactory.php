<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class InterventionDomainsFactory extends Factory
{
    public function definition(): array
    {
        $name = fake()->name;

        return [
            'name' => $name,
            'slug' => Str::slug($name),
        ];
    }
}
