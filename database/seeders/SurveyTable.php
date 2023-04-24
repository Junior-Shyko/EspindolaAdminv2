<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Factory;
use App\Models\Survey;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SurveyTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //d
        $faker = Factory::create();
        $dataNow =  Carbon::now();
        
        for ($i=0; $i < 15000; $i++) { 
            $status = 'Finalizada';
            $filed = 0;
            fmod($i , 2) ? $status = "Rascunho" : $status = 'Finalizada';
            fmod($i , 2) ? $filed = 0 : $filed = 1;
           
            Survey::create([
                'survey_date' => $dataNow->format('Y-m-d'),
                'survey_status' => $status,
                'survey_finalized_date' => $dataNow->format('Y-m-d'),
                'survey_filed' => $filed,
                'survey_address_immobile' => $faker->address ,
                'survey_type' => $faker->word,
                'survey_type_immobile' => $faker->word,
                'survey_reservation' => $faker->text(200),
                'survey_general_aspects' => $faker->text(200),
                'survey_code' => $faker->numberBetween(1000, 9000),
            ]);
        }
    }
}
