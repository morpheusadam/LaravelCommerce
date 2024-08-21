<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('fa_IR'); // تنظیم زبان فارسی

        $photos = [
            'https://gishasport.com/wp-content/uploads/2024/08/D1-%D8%AF%D8%B3%D8%AA%DA%AF%D8%A7%D9%87-%D8%AA%D9%86%D9%81%D8%B3.jpg',
            'https://gishasport.com/wp-content/uploads/2024/08/D-1%DB%8C%D9%88%DA%AF%D8%A7-%D9%85%D9%88%D8%A8%D8%A7%DB%8C%D9%84.jpg',
            'https://gishasport.com/wp-content/uploads/2024/08/%D8%B1%DA%A9%D8%A7%D8%A8%DB%8C-%D9%85%D8%B1%D8%AF%D8%A7%D9%86%D9%87-D-1.jpg',
            'https://gishasport.com/wp-content/uploads/2024/08/%D9%81%D8%B5%D9%84%D8%8C%D9%81%D8%B5%D9%84-%D8%A2%D8%A8%D8%AA%D9%86%DB%8C%D9%87-D-1-2.jpg',
            'https://gishasport.com/wp-content/uploads/2024/07/%D8%AA%D8%A7%D8%A8%D8%B3%D8%AA%D9%88%D9%86-%D9%88-%D8%A7%D8%B3%D8%AA%D8%AE%D8%B1%D8%B4-D1.jpg',
            'https://gishasport.com/wp-content/uploads/2024/08/%D8%B1%DA%A9%D8%A7%D8%A8%DB%8C-%D9%85%D8%B1%D8%AF%D8%A7%D9%86%D9%87-D-1.jpg'
        ];

        for ($i = 0; $i < 3; $i++) {
            DB::table('banners')->insert([
                'title' => $faker->sentence,
                'slug' => Str::slug($faker->sentence),
                'photo' => $photos[$i], // انتخاب عکس به ترتیب
                'description' => $faker->paragraph,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
