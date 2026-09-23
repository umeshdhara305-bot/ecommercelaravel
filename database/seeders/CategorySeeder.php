<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::create([
            'cat_name' => 'Electronics',
            'cat_description' => 'Electronic products',
            'status' => 1
        ]);

        Category::create([
            'cat_name' => 'Clothing',
            'cat_description' => 'Clothing and fashion products',
            'status' => 1
        ]);

        Category::create([
            'cat_name' => 'Shoes',
            'cat_description' => 'All types of shoes',
            'status' => 1
        ]);

        Category::create([
            'cat_name' => 'Mobile Phones',
            'cat_description' => 'Smartphones and mobile accessories',
            'status' => 1
        ]);
    }
}
