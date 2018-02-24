<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Lifestyle'
        ]);

        Category::create([
            'name' => 'News'
        ]);

        Category::create([
            'name' => 'Business'
        ]);

        Category::create([
            'name' => 'Relationships'
        ]);

        Category::create([
            'name' => 'Sport'
        ]);

        Category::create([
            'name' => 'Education'
        ]);

        Category::create([
            'name' => 'Health'
        ]);

        Category::create([
            'name' => 'Faith'
        ]);
    }
}
