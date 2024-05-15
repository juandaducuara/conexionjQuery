<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Municipio;
use App\Models\Departamento;
use Faker\Factory as Faker;

class MunicipioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('es_ES');
        
        $departamentos = Departamento::all();

        foreach ($departamentos as $departamento) {
            for ($i = 0; $i < 3; $i++) {
                $municipio = $faker->unique()->city;
                Municipio::create([
                    'nombre' => $municipio,
                    'departamento_id' => $departamento->id
                ]);
            }
        }
    }
}
