<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $categories = [
            'Professional',
            'Personal',
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate([
                'name' => $category,
            ], [
                'name' => $category,
            ]);
        }
    }
}
