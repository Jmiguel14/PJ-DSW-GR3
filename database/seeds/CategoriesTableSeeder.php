<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Vaciar la tabla.
        Category::truncate();

        $faker = \Faker\Factory::create();
        // Crear productos ficticios en la table

        for($i = 0; $i < 5; $i++) {
            Category::create([
                'name'=> $faker->name,
            ]);
        }
    }
}
