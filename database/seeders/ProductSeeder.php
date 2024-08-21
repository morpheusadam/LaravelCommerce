<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('fa_IR'); // تنظیم زبان فارسی

        $categoryIds = DB::table('categories')->pluck('id')->toArray();
        $brandIds = DB::table('brands')->pluck('id')->toArray();

        for ($i = 0; $i < 20; $i++) {
            DB::table('products')->insert([
                'title' => $faker->word,
                'slug' => Str::slug($faker->word . '-' . $i),
                'summary' => $faker->sentence,
                'description' => $faker->paragraph,
                'photo' => $faker->imageUrl(640, 480, 'sports', true, 'Faker'),
                'stock' => $faker->numberBetween(1, 100),
                'size' => $faker->randomElement(['S', 'M', 'L', 'XL']),
                'condition' => $faker->randomElement(['default', 'new', 'hot']),
                'status' => $faker->randomElement(['active', 'inactive']),
                'price' => $faker->randomFloat(2, 10, 1000),
                'discount' => $faker->optional(0.5, 0)->randomFloat(2, 0, 100), // تنظیم مقدار پیش‌فرض برای discount
                'is_featured' => $faker->boolean,
                'cat_id' => $faker->optional()->randomElement($categoryIds),
                'child_cat_id' => $faker->optional()->randomElement($categoryIds),
                'brand_id' => $faker->optional()->randomElement($brandIds),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}