<?php

use App\User;
use App\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        $faker = \Faker\Factory::create();
        // Crear la misma clave para todos los usuarios
        // conviene hacerlo antes del for para que el seeder
        // no se vuelva lento.
        $password = Hash::make('123456');
        User::create([
            'name' => 'Administrador',
            'lastname' => 'Prueba',
            'email' => 'admin@prueba.com',
            'password' => $password,
            'phone' => 988185518,
            'business_name' => 'tienda carmita',
            'description' => 'Mini marquet',
        ]);
        // Generar algunos usuarios para nuestra aplicacion
        for ($i = 0; $i < 9; $i++) {
            $user=User::create([
                'name' => $faker->name,
                'lastname' => $faker->lastName,
                'email' => $faker->email,
                'password' => $password,
                'phone' => $faker->phoneNumber,
                'business_name' => $faker->company,
                'description' => $faker->paragraph,
            ]);
        }
    }
}
