<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();
        //  \App\Models\Student::factory(50)->create();
        //  \App\Models\Teacher::factory(20)->create();

        \App\Models\User::factory()->create([
            'name' => 'kazi toha',
            'email' => 'kazitoha03@gmail.com',
            'password' => Hash::make('123456789'),
        ]);
    }
}
