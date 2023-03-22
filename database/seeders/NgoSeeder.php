<?php

namespace Database\Seeders;

use App\Models\Ngo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class NgoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (($open = fopen("./database/seeders/data/ngo_contact.csv", "r")) !== FALSE) {
            while (($data = fgetcsv($open, 1000, ",")) !== FALSE) {

                $ngos[] = collect($data)->map(function ($item) {
                    return trim($item);
                })->toArray();;

            }
            $insertArr = [];
            $translationArrayName = $this->getTranslationNames();
            $translationArrayDescription = $this->getTranslationDescription();
//            $activitiesDomains = $this->getActivitiesDomains();
//            dd($ngos);
            foreach ($ngos as $ngo) {
                $tmpArr = [];
                $slug = Str::slug($ngo[0]);
                unset($translationArrayName[$slug]['slug'], $translationArrayDescription[$slug]['slug']);
                $tmpArr['name'] = json_encode($translationArrayName[$slug]);
                $tmpArr['slug'] = $slug;
                $tmpArr['description'] = json_encode($translationArrayDescription[$slug]);
                $tmpArr['activity_domains'] = json_encode([]);
                $tmpArr['phone'] = $ngo[1];
                $tmpArr['address'] = '';
                $tmpArr['contact_email'] = $ngo[2];
                $tmpArr['website'] = $ngo[3];
                $tmpArr['social_icons'] =json_encode( ['name' => 'facebook', 'url' => $ngo[4]]);
                $tmpArr['story'] = $ngo[5];
                $insertArr[] = $tmpArr;

            }
//            dd($insertArr);
            Ngo::insert($insertArr);

            fclose($open);

        }
    }

    private function getTranslationNames()
    {
        $json = '{"asociatia-radautiul-civic":{"slug":"asociatia-radautiul-civic","ro":"Asociatia Radautiul Civic ","en":"Radautiul Civic Association","uk":"\u0413\u0440\u043e\u043c\u0430\u0434\u0441\u044c\u043a\u0435 \u041e\u0431\u2019\u0454\u0434\u043d\u0430\u043d\u043d\u044f Radautiul"},"fundatia-profilaxis":{"slug":"fundatia-profilaxis","ro":"Fundatia Profilaxis","en":"Profilaxis Foundation","uk":"\u0424\u043e\u043d\u0434 \"Profilaxis\""},"societatea-pentru-copii-si-parinti-scop":{"slug":"societatea-pentru-copii-si-parinti-(scop)","ro":"Societatea pentru Copii si Parinti (SCOP)","en":"Society for Children and Parents","uk":"\u0422\u043e\u0432\u0430\u0440\u0438\u0441\u0442\u0432\u043e \u0414\u0456\u0442\u0435\u0439 \u0456 \u0411\u0430\u0442\u044c\u043a\u0456\u0432"},"assoc-asociatia-profesionala-neguvernamentala-de-asistenta-sociala":{"slug":"assoc-asociatia-profesionala-neguvernamentala-de-asistenta-sociala","ro":"ASSOC-Asociatia Profesionala Neguvernamentala de Asistenta Sociala","en":"ASSOC Association","uk":"\u0410\u0441\u043e\u0446\u0456\u0430\u0446\u0456\u044f \"ASSOC\""},"asociatia-esperando":{"slug":"asociatia-esperando","ro":"Asociatia Esperando ","en":"Esperando Association","uk":"\u0410\u0441\u043e\u0446\u0456\u0430\u0446\u0456\u044f \"\u0415\u0441\u043f\u0435\u0440\u0430\u043d\u0434\u043e\""},"autism-baia-mare":{"slug":"autism-baia-mare","ro":"Autism Baia Mare","en":"Autism Baia Mare","uk":"\u0410\u0443\u0442\u0438\u0437\u043c \u0411\u0430\u044f \u041c\u0430\u0440\u0435"},"star-of-hope":{"slug":"star-of-hope","ro":"Star of Hope","en":"Star of Hope","uk":"\u0417\u0456\u0440\u043a\u0430 \u041d\u0430\u0434\u0456\u0457"},"fundatia-serviciilor-sociale-bethany":{"slug":"fundatia-serviciilor-sociale-bethany","ro":"Fundatia Serviciilor Sociale Bethany","en":"Social Services Bethany Foundation","uk":"\u0421\u043e\u0446\u0456\u0430\u043b\u044c\u043d\u0456 \u043f\u043e\u0441\u043b\u0443\u0433\u0438 \u0424\u043e\u043d\u0434\u0443 Bethany"},"asociatia-buna-ziua-copii-din-romania":{"slug":"asociatia-buna-ziua-copii-din-romania","ro":"Asociatia Buna Ziua Copii din Romania","en":"Good Day Children from Romania Association","uk":"\u0410\u0441\u043e\u0446\u0456\u0430\u0446\u0456\u044f \u00ab\u0414\u043e\u0431\u0440\u0438\u0439 \u0434\u0435\u043d\u044c \u0434\u0456\u0442\u0438 \u0437 \u0420\u0443\u043c\u0443\u043d\u0456\u0457\u00bb"},"fundatia-inima-de-copil":{"slug":"fundatia-inima-de-copil","ro":"Fundatia Inima de Copil","en":"Heart of a Child Foundation","uk":"\u0424\u043e\u043d\u0434 \u00ab\u0421\u0435\u0440\u0446\u0435 \u0434\u0438\u0442\u0438\u043d\u0438\u00bb"},"asociatia-club-sportiv-olimpic-snagov":{"slug":"asociatia-club-sportiv-olimpic-snagov","ro":"Asociatia Club Sportiv Olimpic Snagov","en":"Snagov Olympic Sports Club Association","uk":"\u0410\u0441\u043e\u0446\u0456\u0430\u0446\u0456\u044f \"\u041e\u043b\u0456\u043c\u043f\u0456\u0439\u0441\u044c\u043a\u0438\u0439 \u0441\u043f\u043e\u0440\u0442\u0438\u0432\u043d\u0438\u0439 \u043a\u043b\u0443\u0431 \u00ab\u0421\u043d\u0430\u0433\u043e\u0432\u00bb\""},"asociatia-carusel":{"slug":"asociatia-carusel","ro":"Asociatia Carusel","en":"Carusel Association","uk":"\u0410\u0441\u043e\u0446\u0456\u0430\u0446\u0456\u044f \"\u041a\u0430\u0440\u0443\u0441\u0435\u043b\u044c\""},"organizatia-natonala-cercetasii-romaniei":{"slug":"organizatia-natonala-cercetasii-romaniei","ro":"Organizatia Natonala Cercetasii Romaniei","en":"National Organization of Romanian Scouts","uk":"\u041d\u0430\u0446\u0456\u043e\u043d\u0430\u043b\u044c\u043d\u0430 \u041e\u0440\u0433\u0430\u043d\u0456\u0437\u0430\u0446\u0456\u044f \u0420\u0443\u043c\u0443\u043d\u0441\u044c\u043a\u0438\u0445 \u0421\u043a\u0430\u0443\u0442\u0456\u0432\n"},"fundatia-internationala-pentru-copil-si-familie-ficf":{"slug":"fundatia-internationala-pentru-copil-si-familie-(ficf)","ro":"Fundatia Internationala pentru Copil si Familie (FICF)","en":"International Foundation for Child and Family (FICF)","uk":"\u041c\u0456\u0436\u043d\u0430\u0440\u043e\u0434\u043d\u0438\u0439 \u0444\u043e\u043d\u0434 \u0434\u043b\u044f \u0414\u0438\u0442\u0438\u043d\u0438 \u0442\u0430 \u0421\u0456\u043c\'\u0457 (FICF)"},"fundatia-sera-romania":{"slug":"fundatia-sera-romania","ro":"Fundatia Sera Romania","en":"Sera Romania Foundation","uk":"\u0424\u043e\u043d\u0434 \"Sera Romania\""},"fundatia-estuar":{"slug":"fundatia-estuar","ro":"Fundatia Estuar","en":"Estuar Foundation","uk":"\u0424\u043e\u043d\u0434 \u00ab\u0415\u0441\u0442\u0443\u0430\u0440\u00bb"},"aliat-for-mental-health":{"slug":"aliat-for-mental-health","ro":"ALIAT for Mental Health","en":"ALIAT for Mental Health","uk":"ALIAT \u0434\u043b\u044f \u041f\u0441\u0438\u0445\u0456\u0447\u043d\u043e\u0433\u043e \u0417\u0434\u043e\u0440\u043e\u0432\'\u044f\n"},"asociatia-q-arts":{"slug":"asociatia-q-arts","ro":"Asociatia Q-Arts","en":"Q-Arts Association","uk":"\u0410\u0441\u043e\u0446\u0456\u0430\u0446\u0456\u044f \"Q-Arts\""},"hands-across-romania":{"slug":"hands-across-romania","ro":"Hands Across Romania","en":"Hands Across Romania","uk":"Hands Across Romania"},"federatia-organizatiilor-neguvernamentale-pentru-copil-fonpc":{"slug":"federatia-organizatiilor-neguvernamentale-pentru-copil-(fonpc)","ro":"Federatia Organizatiilor Neguvernamentale pentru Copil (FONPC) ","en":"The Federation of Non-Governmental Organizations for Children (FONPC)","uk":"\u0424\u0435\u0434\u0435\u0440\u0430\u0446\u0456\u044f \u041d\u0435\u0443\u0440\u044f\u0434\u043e\u0432\u0438\u0445 \u041e\u0440\u0433\u0430\u043d\u0456\u0437\u0430\u0446\u0456\u0439 \u0434\u043b\u044f \u0414\u0456\u0442\u0435\u0439 (\u0424\u041e\u041d\u0414\u0426)"},"asociatia-de-ajutor-amurtel-romania":{"slug":"asocia\u021bia-de-ajutor-amurtel-rom\u00e2nia","ro":"Asocia\u021bia de Ajutor AMURTEL Rom\u00e2nia","en":"AMURTEL Romania Aid Association","uk":"\u0410\u0441\u043e\u0446\u0456\u0430\u0446\u0456\u044f \u0414\u043e\u043f\u043e\u043c\u043e\u0433\u0438 \u0420\u0443\u043c\u0443\u043d\u0456\u0457 AMURTEL"},"create-yourself":{"slug":"create-yourself","ro":"Create Yourself","en":"Create Yourself","uk":"Create Yourself"},"fundatia-fara":{"slug":"funda\u021bia-fara","ro":"Funda\u021bia FARA","en":"FARA Foundation","uk":"\u0424\u043e\u043d\u0434 FARA"},"fundatia-parada":{"slug":"funda\u021bia-parada","ro":"Funda\u021bia Parada","en":"Parada Foundation","uk":"\u0424\u043e\u043d\u0434 Parada"},"asociatia-youhub":{"slug":"asocia\u021bia-youhub","ro":"Asocia\u021bia YouHub","en":"YouHub Association","uk":"\u0410\u0441\u043e\u0446\u0456\u0430\u0446\u0456\u044f \"YouHub\""}}';

        return json_decode($json, true);
    }

    private function getTranslationDescription()
    {
        $json = file_get_contents("./database/seeders/data/ngo_description.json");
        return json_decode($json, true);

    }

    private function getActivitiesDomains()
    {
        return [];
    }

}
