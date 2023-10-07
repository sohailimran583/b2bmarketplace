<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        \App\Models\User::factory()->create([
            'name' => 'user', 
            'email' => 'user@gmail.com',
            'password' =>Hash::make('user123'),
            'role_id' =>2,
        ]);
         
      
       
    }
}
