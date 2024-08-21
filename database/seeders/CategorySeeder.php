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

        // ایجاد دسته‌بندی‌های والد
        for ($i = 0; $i < 5; $i++) {
            DB::table('categories')->insert([
                'title' => $faker->word,
                'slug' => Str::slug($faker->word . '-' . $i),
                'summary' => $faker->sentence,
                'photo' => $faker->imageUrl(640, 480, 'cats', true, 'Faker'),
                'is_parent' => 1,
                'parent_id' => null,
                'added_by' => $faker->optional()->numberBetween(1, 10),
                'status' => $faker->randomElement(['active', 'inactive']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // دریافت ID دسته‌بندی‌های والد
        $parentIds = DB::table('categories')->pluck('id')->toArray();

        // ایجاد دسته‌بندی‌های فرزند
        for ($i = 0; $i < 5; $i++) {
            DB::table('categories')->insert([
                'title' => $faker->word,
                'slug' => Str::slug($faker->word . '-' . ($i + 5)),
                'summary' => $faker->sentence,
                'photo' => $faker->imageUrl(640, 480, 'cats', true, 'Faker'),
                'is_parent' => 0,
                'parent_id' => $faker->randomElement($parentIds),
                'added_by' => $faker->optional()->numberBetween(1, 10),
                'status' => $faker->randomElement(['active', 'inactive']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}