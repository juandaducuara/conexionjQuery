<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Persona;
use App\Models\Municipio;
use Faker\Factory as Faker;

class PersonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('es_ES');
        
        $municipios = Municipio::all();

        foreach ($municipios as $municipio) {
            for ($i = 0; $i < 10; $i++) {
                Persona::create([
                    'nombre' => $faker->firstName,
                    'apellido' => $faker->lastName,
                    'municipio_id' => $municipio->id
                ]);
            }
        }
    }
}
