<?php

namespace Database\Seeders;

use App\Models\President;
use Illuminate\Database\Seeder;
use OpenAI\Laravel\Facades\OpenAI;
use Illuminate\Support\Facades\Log;



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
        $name = $president['name'];
        Log::info("Query OpenAI API to retrieve info abut $name");

        $msg = "Write a json with the info of $name with the following fields: first_name, last_name,  start_year (year when he starts to be president),  end_year (year when he finished to be president), date_of_birth (YYYY-MM-DD format), date_of_death, (YYYY-MM-DD format), abstract (50 word), wikipedia_url. Following fields must be in different languages: abstract, wikipedia_url. Different languages means that the field must be translated into different languages (English, Italian, French, German, Spanish, Portuguese). Fields first_name and last_name must not be translated.";
        $result = OpenAI::chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'user', 'content' => $msg],
            ],
        ]);
        $ja = json_decode($result->choices[0]->message->content,TRUE);
        $fields = [
            'first_name',
            'last_name',
            'start_year',
            'end_year',
            'date_of_birth',
            'date_of_death',
        ];
        foreach($fields as $field) {
            $p->$field=$ja[$field];
        }
        // Abstract
        foreach(array_keys($ja['abstract']) as $lang) {
            $p->setTranslation('abstract',$lang,$ja['abstract'][$lang]);
        }
        // Wikipedia
        foreach(array_keys($ja['wikipedia_url']) as $lang) {
            $p->setTranslation('wikipedia_url',$lang,$ja['wikipedia_url'][$lang]);
        }    
        $p->save();
        Log::info("$name.... DONE! Data saved to DB");

    }          
    }
}
