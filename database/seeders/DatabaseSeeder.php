<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Meylin Tiflakhul',
            'email' => 'user@gmail.com',
            'email_verified_at' => now(),
            'email_verification_token' => Str::random(50),
            'password' => bcrypt('user123'),
            'role' => 'User',
        ]);
    }
}
