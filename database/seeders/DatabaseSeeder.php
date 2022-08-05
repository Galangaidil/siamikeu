<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//         \App\Models\User::factory(10)->create();
         \App\Models\Customer::factory(99)->create();
         \App\Models\Price::factory(10)->create();
         \App\Models\Purchase::factory(10)->create();
         \App\Models\Sale::factory(5)->create();

        // Create user with admin privileges
        DB::table('users')->insert([
            'name' => 'Galang',
            'email' => 'galangaidil45@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);


    }
}
