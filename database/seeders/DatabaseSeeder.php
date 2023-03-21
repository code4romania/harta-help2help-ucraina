<?php

declare(strict_types=1);

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\ActivityDomain;
use App\Models\BeneficiaryGroup;
use App\Models\InterventionDomains;
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
        $this->seedBeneficiaryGroups();
    }

    private function seedInterventionDomains()
    {
        $domains = [
            [
                'name' => [
                    'ro' => 'health',
                    'en' => 'health',
                    'uk' => 'health',
                ],
                'icon' => 'heroicon-o-heart',
                'url' => '#',
            ],
            [
                'name' => [
                    'ro' => 'food',
                    'en' => 'food',
                    'uk' => 'food',
                ],
                'icon' => 'heroicon-o-cake',
                'url' => '#',
            ],
            [
                'name' => [
                    'ro' => 'house',
                    'en' => 'house',
                    'uk' => 'house',
                ],
                'icon' => 'heroicon-o-home',
                'url' => '#',
            ],
            [
                'name' => [
                    'ro' => 'hygiene',
                    'en' => 'hygiene',
                    'uk' => 'hygiene',
                ],
                'icon' => 'heroicon-o-heart',
                'url' => '#',
            ],
            [
                'name' => [
                    'ro' => 'finance_support',
                    'en' => 'finance_support',
                    'uk' => 'finance_support',
                ],
                'icon' => 'heroicon-o-check',
                'url' => '#',
            ],
            [
                'name' => [
                    'ro' => 'protection',
                    'en' => 'protection',
                    'ua' => 'protection',
                ],
                'icon' => 'heroicon-o-shield-check',
                'url' => '#',
            ],
            [
                'name' => [
                    'ro' => 'education',
                    'en' => 'education',
                    'uk' => 'education',
                ],
                'icon' => 'heroicon-o-academic-cap',
                'url' => '#',
            ],
            [
                'name' => [
                    'ro' => 'management',
                    'en' => 'management',
                    'ua' => 'management',
                ],
                'icon' => 'heroicon-o-bookmark',
                'url' => '#',
            ],
            [
                'name' => [
                    'ro' => 'integration',
                    'en' => 'integration',
                    'ua' => 'integration',
                ],
                'icon' => 'heroicon-o-user-group',
                'url' => '#',
            ],

        ];
        $insertArr = [];
        foreach ($domains as $domain) {
            $insertArr[] = ['name' => collect($domain['name'])->toJson(), 'slug' => Str::slug($domain['name']['ro'])];
        }
        InterventionDomains::insert($insertArr);
    }

    private function seedActivityDomains()
    {
        $domainList =
            [
                [
                    'name' => [
                        'ro' => 'Asistență socială/Sevicii sociale',
                        'en' => 'Social services',
                        'uk' => 'Соціальна допомога',
                    ],
                ],
                [
                    'name' => [
                        'ro' => 'Sănătate',
                        'en' => 'Health',
                        'uk' => "Охорона здоров'я",
                    ],
                ],
                [
                    'name' => [
                        'ro' => 'Tineret',
                        'en' => 'Youth',
                        'uk' => 'Молодь',
                    ],
                ],
                [
                    'name' => [
                        'ro' => 'Acțiuni umanitare',
                        'en' => 'Humanitarian action',
                        'uk' => 'Місцевий розвиток',

                    ],
                ],
                [
                    'name' => [
                        'ro' => 'Protecția victimelor violenței domestice, a traficului de persoane',
                        'en' => 'Protecția victimelor violenței domestice, a traficului de persoane',
                        'uk' => 'Protecția victimelor violenței domestice, a traficului de persoane',
                    ],
                ],
                [
                    'name' => [
                        'ro' => 'Educație',
                        'en' => 'Education',
                        'uk' => 'освіта',
                    ],
                ],
                [
                    'name' => [
                        'ro' => 'protecția copilului',
                        'en' => ' Child protection',
                        'uk' => ' Охорона дитинства',
                    ],
                ],

                [
                    'name' => [
                        'ro' => 'Sprijin pentru dependențe (alcool, droguri etc)',
                        'em' => 'Support for addictions (alcohol, drugs etc)',
                        'uk' => 'Підтримка залежностей (алкоголю, наркотиків тощо)',
                    ],
                ],
                [
                    'name' => [
                        'ro' => 'Egalitate de șanse',
                        'en' => 'Egalitate de șanse',
                        'uk' => 'Egalitate de șanse',
                    ],
                ],
                ['name' => [
                    'ro' => 'Cultură',
                    'en' => 'Culture',
                    'uk' => 'Культура',
                ],
                ],

                [
                    'name' => [
                        'ro' => 'Mediu',
                        'en' => 'Environment',
                        'uk' => 'Довкілля',
                    ],
                ],
                [
                    'name' => [
                        'ro' => 'Dezvoltare locală',
                        'en' => 'Dezvoltare locală',
                        'uk' => 'Dezvoltare locală',
                    ],
                ],
            ];
        $insertArr = [];
        foreach ($domainList as $domain) {
            $insertArr[] = ['name' => collect($domain['name'])->toJson()];
        }
        ActivityDomain::insert($insertArr);
    }

    private function seedBeneficiaryGroups()
    {
        $json = '[
   "{\"ro\":\"Adul\\u021bi\",\"en\":\"Adults\",\"uk\":\"\\u0414\\u043e\\u0440\\u043e\\u0441\\u043b\\u0456\"}",
   "{\"ro\":\"Adul\\u021bi cu dizabilit\\u0103\\u021bi\",\"en\":\"Adults with disabilities\",\"uk\":\"\\u0414\\u043e\\u0440\\u043e\\u0441\\u043b\\u0456 \\u0437 \\u043e\\u0431\\u043c\\u0435\\u0436\\u0435\\u043d\\u0438\\u043c\\u0438 \\u043c\\u043e\\u0436\\u043b\\u0438\\u0432\\u043e\\u0441\\u0442\\u044f\\u043c\\u0438\"}",
   "{\"ro\":\"Copii (inclusiv copii singuri\\\/orfani)\",\"en\":\"Children (including alone\\\/orphans)\",\"uk\":\"\\u0414\\u0456\\u0442\\u0438 (\\u0432 \\u0442\\u043e\\u043c\\u0443 \\u0447\\u0438\\u0441\\u043b\\u0456 \\u0441\\u0430\\u043c\\u043e\\u0442\\u043d\\u0456\\\/\\u0441\\u0438\\u0440\\u043e\\u0442\\u0438)\"}",
   "{\"ro\":\"Copii cu dizabilit\\u0103\\u021bi\\\/Copii cu nevoi speciale\",\"en\":\"Children with disabilities\\\/Children with special needs\",\"uk\":\"\\u0414\\u0456\\u0442\\u0438 \\u0437 \\u043e\\u0431\\u043c\\u0435\\u0436\\u0435\\u043d\\u0438\\u043c\\u0438 \\u043c\\u043e\\u0436\\u043b\\u0438\\u0432\\u043e\\u0441\\u0442\\u044f\\u043c\\u0438\\\/\\u0414\\u0456\\u0442\\u0438 \\u0437 \\u043e\\u0441\\u043e\\u0431\\u043b\\u0438\\u0432\\u0438\\u043c\\u0438 \\u043f\\u043e\\u0442\\u0440\\u0435\\u0431\\u0430\\u043c\\u0438\"}",
   "{\"ro\":\"V\\u00e2rstnici\",\"en\":\"Elderly\",\"uk\":\"\\u041b\\u044e\\u0434\\u0438 \\u043f\\u043e\\u0445\\u0438\\u043b\\u043e\\u0433\\u043e \\u0432\\u0456\\u043a\\u0443\"}",
   "{\"ro\":\"Femei victime ale violen\\u021bei domestice, mame singure\",\"en\":\"Women victims of domestic violence, single mothers\",\"uk\":\"\\u0416\\u0456\\u043d\\u043a\\u0438, \\u044f\\u043a\\u0456 \\u043f\\u043e\\u0441\\u0442\\u0440\\u0430\\u0436\\u0434\\u0430\\u043b\\u0438 \\u0432\\u0456\\u0434 \\u0434\\u043e\\u043c\\u0430\\u0448\\u043d\\u044c\\u043e\\u0433\\u043e \\u043d\\u0430\\u0441\\u0438\\u043b\\u044c\\u0441\\u0442\\u0432\\u0430, \\u043e\\u0434\\u0438\\u043d\\u043e\\u043a\\u0456 \\u043c\\u0430\\u0442\\u0435\\u0440\\u0456\"}",
   "{\"ro\":\"Tineri\",\"en\":\"Youth\",\"uk\":\"\\u041c\\u043e\\u043b\\u043e\\u0434\\u044c\"}",
   "{\"ro\":\"Copii \\u0219i adul\\u021bi\",\"en\":\"Children and adults\",\"uk\":\"\\u0414\\u0456\\u0442\\u0438 \\u0456 \\u0434\\u043e\\u0440\\u043e\\u0441\\u043b\\u0456\"}",
   "{\"ro\":\"Tineri \\u0219i adul\\u021bi\",\"en\":\"Youth and adults\",\"uk\":\"\\u041c\\u043e\\u043b\\u043e\\u0434\\u044c \\u0456 \\u0434\\u043e\\u0440\\u043e\\u0441\\u043b\\u0456\"}",
   "{\"ro\":\"Copii \\u0219i tineri\",\"en\":\"Children and youth\",\"uk\":\"\\u0414\\u0456\\u0442\\u0438 \\u0442\\u0430 \\u043c\\u043e\\u043b\\u043e\\u0434\\u044c\"}"
]';
        $arr = json_decode($json);
        $insertArr = [];
        foreach ($arr as $value) {
            $insertArr[] = ['name' => $value];
        }
        BeneficiaryGroup::insert($insertArr);
    }
}
