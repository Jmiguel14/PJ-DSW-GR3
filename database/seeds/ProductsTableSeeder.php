<?php

use App\Product;
use Illuminate\Database\Seeder;
use Tymon\JWTAuth\Facades\JWTAuth;

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
	$users=App\User::all();
	foreach($users as $user){
	JWTAuth::attempt(['email'=>$user->email,'password'=>'123456']);
	$categories=App\Category::all();
        foreach($categories as $category){
            for($i = 0; $i < 1; $i++) {
                Product::create([
                    'name'=> $faker->name,
                    'description'=> $faker->sentence,
                    'price'=> $faker->randomFloat(2,1, 50),
                    'quantity'=> $faker->numberBetween(1, 100),
                    'base' => $faker->numberBetween(10,15),
                    'category_id'=>$category->id,
                ]);
            }
        }
	}


    }
}
