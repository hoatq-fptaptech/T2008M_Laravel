<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
//        $this->call([
//            CategorySeeder::class
//        ]);
        DB::table("admins")->insert([
            "name"=>"Administrator",
            "email"=>"admin@gmail.com",
            "role"=>"ADMIN",
            "password"=>bcrypt("12345678")
        ]);
        DB::table("admins")->insert([
            "name"=>"User",
            "email"=>"user@gmail.com",
            "role"=>"USER",
            "password"=>bcrypt("12345678")
        ]);
    }
}
