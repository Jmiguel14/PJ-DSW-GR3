<?php

use App\Petition;
use Illuminate\Database\Seeder;

class PetitionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Vaciar la tabla.
        Petition::truncate();

        $faker = \Faker\Factory::create();
        // Crear notificaciones ficticias en la table

        for($i = 0; $i < 50; $i++) {
            Petition::create([
                'status'=> $faker->randomElement(['accepted', 'rejected']),
            ]);
        }
    }
}
