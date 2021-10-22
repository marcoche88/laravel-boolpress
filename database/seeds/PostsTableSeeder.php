<?php

use App\Models\Post;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Arr;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $categories_id = Category::select('id')->pluck('id')->toArray();

        for ($i = 0; $i < 50; $i++) {
            $post = new Post();

            $post->category_id = Arr::random($categories_id);
            $post->title = $faker->text(50);
            $post->content = $faker->paragraph(2, true);
            $post->image = $faker->imageUrl(200, 200);
            $post->save();
        }
    }
}
