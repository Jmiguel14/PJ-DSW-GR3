<?php

use App\Petition;
use Illuminate\Database\Seeder;
use Tymon\JWTAuth\Facades\JWTAuth;

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
        $users=App\User::all();
        foreach ($users as $user){
            JWTAuth::attempt(['email'=>$user->email,'password'=>'123456']);
            for($i = 0; $i < 3; $i++) {
                Petition::create([
                    'status'=> $faker->randomElement(['accepted', 'rejected']),
                ]);
            }
        }

    }
}
