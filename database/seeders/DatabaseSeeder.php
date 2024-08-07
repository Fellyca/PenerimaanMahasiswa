<?php

namespace Database\Seeders;

use App\Models\User;
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
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'email' => 'admin@gmail.com',
            'is_accepted' => 1,
            'password' => bcrypt('123456'),
            'role' => 'admin'
        ]);
        User::create([
            'email' => 'fellyca@gmail.com',
            'is_accepted' => 1,
            'password' => bcrypt('123456'),
            'role' => 'mhs'
        ]);
    }
}
