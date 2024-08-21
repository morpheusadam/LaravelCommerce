<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('fa_IR'); // تنظیم زبان فارسی

        $categoryIds = DB::table('post_categories')->pluck('id')->toArray();
        $tagIds = DB::table('post_tags')->pluck('id')->toArray();
        $userIds = DB::table('users')->pluck('id')->toArray();

        for ($i = 0; $i < 10; $i++) {
            DB::table('posts')->insert([
                'title' => $faker->sentence,
                'slug' => Str::slug($faker->sentence . '-' . $i),
                'summary' => $faker->paragraph,
                'description' => $faker->paragraphs(3, true),
                'quote' => $faker->optional()->sentence,
                'photo' => $faker->optional()->imageUrl(640, 480, 'nature', true, 'Faker'),
                'tags' => implode(',', $faker->words(3)),
                'post_cat_id' => $faker->optional()->randomElement($categoryIds),
                'post_tag_id' => $faker->optional()->randomElement($tagIds),
                'added_by' => $faker->optional()->randomElement($userIds),
                'status' => $faker->randomElement(['active', 'inactive']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}