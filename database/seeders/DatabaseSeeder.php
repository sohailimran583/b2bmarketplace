<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create(); 

        $this->call(CategoryTableSeeder::class);
        $this->call(RolesTableSeeder::class); 
        $this->call(AdminTableSeeder::class);
        $this->call(UserTableSeeder::class); 
        $this->call(CompanyTableSeeder::class);
       


       

    }
}
