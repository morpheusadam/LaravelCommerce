<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class CouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('fa_IR'); // تنظیم زبان فارسی

        $data = [
            [
                'code' => 'sabc123',
                'type' => 'fixed',
                'value' => '300',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => '1111s11',
                'type' => 'percent',
                'value' => '10',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        for ($i = 0; $i < 8; $i++) {
            $data[] = [
                'code' => Str::random(6),
                'type' => $faker->randomElement(['fixed', 'percent']),
                'value' => $faker->randomFloat(2, 10, 1000),
                'status' => $faker->randomElement(['active', 'inactive']),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('coupons')->insert($data);
    }
}