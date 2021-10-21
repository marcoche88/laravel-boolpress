<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category_names = ['HTML', 'JS', 'CSS', 'PHP', 'Laravel', 'VueJS'];

        foreach ($category_names as $name) {
            $category = new Category();
            $category->name = $name;
            $category->save();
        }
    }
}
