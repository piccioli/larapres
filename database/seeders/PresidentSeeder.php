<?php

namespace Database\Seeders;

use App\Models\President;
use Illuminate\Database\Seeder;

class PresidentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $presidents = [
            ["name" => "Enrico De Nicola", "slug" => "enrico-de-nicola"],
            ["name" => "Luigi Einaudi", "slug" => "luigi-einaudi"],
            ["name" => "Giovanni Gronchi", "slug" => "giovanni-gronchi"],
            ["name" => "Antonio Segni", "slug" => "antonio-segni"],
            ["name" => "Giuseppe Saragat", "slug" => "giuseppe-saragat"],
            ["name" => "Giovanni Leone", "slug" => "giovanni-leone"],
            ["name" => "Sandro Pertini", "slug" => "sandro-pertini"],
            ["name" => "Francesco Cossiga", "slug" => "francesco-cossiga"],
            ["name" => "Oscar Luigi Scalfaro", "slug" => "oscar-luigi-scalfaro"],
            ["name" => "Carlo Azeglio Ciampi", "slug" => "carlo-azeglio-ciampi"],
            ["name" => "Giorgio Napolitano", "slug" => "giorgio-napolitano"],
            ["name" => "Sergio Mattarella", "slug" => "sergio-mattarella"]
          ];
    foreach ($presidents as $president) {
        $p = President::factory()->create($president);
        // TODO: set real abstract $p->setTranslation('abstract','it','ABSTRACT_IT');
        // TODO: set real abstract $p->setTranslation('abstract','en','ABSTRACT_EN');
        $p->save();
    }          
    }
}
