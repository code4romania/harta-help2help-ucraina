<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\ActivityDomain;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class NgoFactory extends Factory
{
    public function definition(): array
    {
        $socialIcons = [
            'facebook' => '#',
            'instagram' => '#',
        ];

        $activityDomains = ActivityDomain::inRandomOrder()->limit(4)->pluck('id');
        $name = fake()->name;

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => fake()->realText(200),
            'number_of_beneficiaries' => fake()->numberBetween(100, 3000),
            'phone' => fake()->phoneNumber(),
            'contact_email' => fake()->email,
            'address' => fake()->address,
            'website' => 'example.com',
            'social_icons' => $socialIcons,
            'activity_domains' => $activityDomains->toArray(),

        ];
    }
}
