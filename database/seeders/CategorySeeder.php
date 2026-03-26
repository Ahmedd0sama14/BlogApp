<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorys = ['Technology', 'Health', 'Travel', 'Food', 'Education', 'Lifestyle', 'Finance',  'Sports', 'Fashion'];
        foreach ($categorys as $category) {
            Category::firstOrCreate(['name' => $category]);
        }
    }
}
