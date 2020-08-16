<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Vaciar la tabla.
        Product::truncate();

        $faker = \Faker\Factory::create();
        // Crear productos ficticios en la table

        for($i = 0; $i < 50; $i++) {
            Product::create([
                'name'=> $faker->name,
                'description'=> $faker->sentence,
                'price'=> $faker->randomFloat(2,1, 50),
                'quantity'=> $faker->numberBetween(1, 100),
                'base' => $faker->numberBetween(10,15),
            ]);
        }
    }
}
