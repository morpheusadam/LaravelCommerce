<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('fa_IR'); // تنظیم زبان فارسی

        $sportCategories = [
            'کفش ورزشی', 'لباس ورزشی', 'توپ', 'لوازم بدنسازی', 'لوازم شنا', 
            'لوازم کوهنوردی', 'لوازم دوچرخه‌سواری', 'لوازم فوتبال', 'لوازم بسکتبال', 
            'لوازم والیبال', 'لوازم تنیس', 'لوازم بدمینتون', 'لوازم یوگا', 
            'لوازم پیاده‌روی', 'لوازم اسکی', 'لوازم اسکیت', 'لوازم گلف', 
            'لوازم بوکس', 'لوازم ژیمناستیک', 'لوازم تیراندازی'
        ];

        // ایجاد دسته‌بندی‌های والد
        foreach ($sportCategories as $i => $category) {
            $parentId = DB::table('categories')->insertGetId([
                'title' => $category,
                'slug' => Str::slug($category . '-' . uniqid()),
                'summary' => $faker->sentence,
                'photo' => $faker->imageUrl(640, 480, 'sports', true, 'Faker'),
                'is_parent' => 1,
                'parent_id' => null,
                'added_by' => $faker->optional()->numberBetween(1, 10),
                'status' => $faker->randomElement(['active', 'inactive']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // ایجاد زیر دسته‌بندی‌ها برای هر دسته‌بندی والد
            for ($j = 0; $j < 3; $j++) {
                DB::table('categories')->insert([
                    'title' => $faker->word,
                    'slug' => Str::slug($faker->word . '-' . uniqid()),
                    'summary' => $faker->sentence,
                    'photo' => $faker->imageUrl(640, 480, 'sports', true, 'Faker'),
                    'is_parent' => 0,
                    'parent_id' => $parentId,
                    'added_by' => $faker->optional()->numberBetween(1, 10),
                    'status' => $faker->randomElement(['active', 'inactive']),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}