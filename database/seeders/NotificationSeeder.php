<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('fa_IR'); // تنظیم زبان فارسی

        for ($i = 0; $i < 10; $i++) {
            DB::table('notifications')->insert([
                'id' => Str::uuid(),
                'type' => $faker->word,
                'notifiable_type' => 'App\\User', // یا هر مدل دیگری که استفاده می‌کنید
                'notifiable_id' => $faker->numberBetween(1, 10),
                'data' => $faker->sentence,
                'read_at' => $faker->optional()->dateTime,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}