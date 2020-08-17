<?php

use App\Notification;
use Illuminate\Database\Seeder;

class NotificationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Vaciar la tabla.
        Notification::truncate();

        $faker = \Faker\Factory::create();
        // Crear productos ficticios en la table

        for($i = 0; $i < 20; $i++) {
            Notification::create([
                'message'=> $faker->paragraph,
            ]);
        }
    }
}
