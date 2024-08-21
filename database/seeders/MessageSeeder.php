<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class MessageSeeder extends Seeder
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
            DB::table('messages')->insert([
                'name' => $faker->name,
                'subject' => $faker->sentence,
                'email' => $faker->email,
                'photo' => $faker->optional()->imageUrl(640, 480, 'people', true, 'Faker'),
                'phone' => $faker->optional()->phoneNumber,
                'message' => $faker->paragraph,
                'read_at' => $faker->optional()->dateTime,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}