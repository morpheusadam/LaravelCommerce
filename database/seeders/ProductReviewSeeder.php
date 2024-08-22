<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProductReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('fa_IR'); // تنظیم زبان فارسی

        $productIds = DB::table('products')->pluck('id')->toArray();
        $userIds = DB::table('users')->pluck('id')->toArray();

        for ($i = 0; $i < 10; $i++) {
            DB::table('product_reviews')->insert([
                'user_id' => $faker->randomElement($userIds), // اطمینان از وجود مقدار
                'product_id' => $faker->randomElement($productIds), // اطمینان از وجود مقدار
                'rate' => $faker->numberBetween(1, 5),
                'review' => $faker->realText(200), // توضیحات با طول زیاد
                'status' => $faker->randomElement(['active', 'inactive']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}