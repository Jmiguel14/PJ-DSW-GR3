<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(UsersTableSeeder::class);
        Schema::disableForeignKeyConstraints();
	$this->call(CategoriesTableSeeder::class);
	$this->call(UsersTableSeeder::class);
        $this->call(PetitionsTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(NotificationsTableSeeder::class);
        Schema::enableForeignKeyConstraints();


    }
}
