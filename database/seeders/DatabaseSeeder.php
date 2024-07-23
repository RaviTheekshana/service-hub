<?php

namespace Database\Seeders;

use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->withPersonalTeam()->create();

        User::factory()->withPersonalTeam()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'phone' => '0777123456',
            'role' => 'admin'
        ]);

        User::factory()->withPersonalTeam()->create([
            'name' => 'Theekshana Alwis',
            'email' => 'theekshanaalwis@gmail.com',
            'phone' => '0776218495',
            'role' => 'admin'
        ]);


        $categories = [
            "electrician",
            "plumber",
            "gardener",
            "welder",
        ];

        foreach ($categories as $category) {
            \App\Models\Category::create([
                'name' => $category,
                'sort_order' => 1,
                'status' => 1,
            ]);
        }

    }
}
