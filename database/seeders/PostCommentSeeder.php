<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PostCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('fa_IR'); // تنظیم زبان فارسی

        $userIds = DB::table('users')->pluck('id')->toArray();
        $postIds = DB::table('posts')->pluck('id')->toArray();

        for ($i = 0; $i < 10; $i++) {
            DB::table('post_comments')->insert([
                'user_id' => $faker->optional()->randomElement($userIds),
                'post_id' => $faker->optional()->randomElement($postIds),
                'comment' => $faker->paragraph,
                'status' => $faker->randomElement(['active', 'inactive']),
                'replied_comment' => $faker->optional()->paragraph,
                'parent_id' => $faker->optional()->randomElement($userIds),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}