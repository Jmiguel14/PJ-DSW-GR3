<?php

use App\Request;
use Illuminate\Database\Seeder;

class RequestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Vaciar la tabla.
        Request::truncate();

        $faker = \Faker\Factory::create();
        // Crear notificaciones ficticias en la table

        for($i = 0; $i < 50; $i++) {
            Request::create([
                'status'=> $faker->randomElement(['accepted', 'rejected']),
            ]);
        }
    }
}
