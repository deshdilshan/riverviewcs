<?php

use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Let's truncate our existing records to start from scratch.
        Article::truncate();

        $faker = \Faker\Factory::create();

        // Let's make sure everyone has the same url 
        $url = '/article/1';

        // And now, let's create a few articles in our database:
        for ($i = 0; $i < 50; $i++) {
            Article::create([
                'title' => $faker->sentence,
                'author_id' => $faker->numberBetween($min = 1, $max = 10)
                'url' => $url,
                'content' => $faker->paragraph,
            ]);
        }
    }
}
