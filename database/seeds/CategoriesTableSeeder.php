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
        $categories = [
            [
                'name' => 'HTML',
                'color' => 'primary'
            ],
            [
                'name' => 'JavaScript',
                'color' => 'warning'
            ],
            [
                'name' => 'CSS',
                'color' => 'danger'
            ],
            [
                'name' => 'PHP',
                'color' => 'info'
            ],
            [
                'name' => 'Laravel',
                'color' => 'secondary'
            ],
            [
                'name' => 'VueJS',
                'color' => 'success'
            ]
        ];

        foreach ($categories as $category) {
            $newCategory = new Category();
            $newCategory->name = $category['name'];
            $newCategory->color = $category['color'];
            $newCategory->save();
        }
    }
}
