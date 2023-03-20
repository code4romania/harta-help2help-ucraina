<?php

declare(strict_types=1);

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\ActivityDomain;
use App\Models\InterventionDomains;
use App\Models\Ngo;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::factory(['email' => 'admin@example.com'])
            ->create();
        $this->seedInterventionDomains();
        $this->seedActivityDomains();
        Ngo::factory()->count(20)->create();
    }

    private function seedInterventionDomains()
    {
        $domains = [
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
        $insertArr = [];
        foreach ($domains as $domain) {
            $insertArr[] = ['name' => Str::title($domain['name']), 'slug' => Str::slug($domain['name'])];
        }
        InterventionDomains::insert($insertArr);
    }

    private function seedActivityDomains()
    {
        $domainList = [
            ['name' => 'Asistență socială/Sevicii sociale'],
            ['name' => 'Sănătate'],
            ['name' => 'Tineret'],
            ['name' => 'Acțiuni umanitare'],
            ['name' => 'Protecția victimelor violenței domestice, a traficului de persoane'],
            ['name' => 'Educație'],
            ['name' => 'Protecția copilului'],
            ['name' => 'Sprijin pentru dependențe (alcool, droguri etc)'],
            ['name' => 'Egalitate de șanse'],
            ['name' => 'Cultură'],
            ['name' => 'Mediu'],
            ['name' => 'Dezvoltare locală'],
        ];
        ActivityDomain::insert($domainList);
    }
}
