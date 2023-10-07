<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      
         
        \App\Models\User::factory()->create([
            'name' => 'company',
            'email' => 'company@gmail.com', 
            'password' =>Hash::make('company123'),
            'role_id' =>3,
        ]);
    }
}
