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

        $sportsItems = [
            'توپ فوتبال', 'توپ بسکتبال', 'راکت تنیس', 'کفش ورزشی', 'لباس ورزشی', 
            'دوچرخه', 'کلاه ایمنی', 'عینک شنا', 'دستکش بوکس', 'کیسه بوکس',
            'تخته اسکیت', 'اسکیت بورد', 'چوب گلف', 'کفش کوهنوردی', 'کوله پشتی ورزشی',
            'طناب ورزشی', 'وزنه', 'دمبل', 'تردمیل', 'دوچرخه ثابت'
        ];

        for ($i = 0; $i < 20; $i++) {
            $title = $faker->randomElement($sportsItems);
            DB::table('products')->insert([
                'title' => $title,
                'slug' => Str::slug($title . '-' . $i),
                'summary' => $faker->realText(200), // خلاصه توضیحات با طول زیاد
                'description' => $faker->realText(1000), // توضیحات با طول زیاد
                'photo' => $faker->imageUrl(640, 480, 'sports', true, 'Faker'),
                'stock' => $faker->numberBetween(1, 100),
                'size' => $faker->randomElement(['S', 'M', 'L', 'XL']),
                'condition' => $faker->randomElement(['default', 'new', 'hot']),
                'status' => $faker->randomElement(['active', 'inactive']),
                'price' => $faker->randomFloat(2, 10, 1000),
                'discount' => $faker->optional(0.5, 0)->randomFloat(2, 0, 100), // تنظیم مقدار پیش‌فرض برای discount
                'is_featured' => $faker->boolean,
                'cat_id' => $faker->randomElement($categoryIds),
                'child_cat_id' => $faker->optional()->randomElement($categoryIds),
                'brand_id' => $faker->optional()->randomElement($brandIds),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}