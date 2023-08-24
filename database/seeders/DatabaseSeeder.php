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

        \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@bookmarkapp.co',
            'password' => \bcrypt('admin'),
        ]);

        // \App\Models\Bookmark::factory(10)->create([
        //     'is_active' => 1,
        // ]);
    }
}
