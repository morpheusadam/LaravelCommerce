<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class OrderSeeder extends Seeder
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
        $shippingIds = DB::table('shippings')->pluck('id')->toArray();

        for ($i = 0; $i < 10; $i++) {
            DB::table('orders')->insert([
                'order_number' => Str::random(10),
                'user_id' => $faker->optional()->randomElement($userIds),
                'sub_total' => $faker->randomFloat(2, 100, 1000),
                'shipping_id' => $faker->optional()->randomElement($shippingIds),
                'coupon' => $faker->optional()->randomFloat(2, 0, 100),
                'total_amount' => $faker->randomFloat(2, 100, 1000),
                'quantity' => $faker->numberBetween(1, 10),
                'payment_method' => $faker->randomElement(['cod', 'paypal']),
                'payment_status' => $faker->randomElement(['paid', 'unpaid']),
                'status' => $faker->randomElement(['new', 'process', 'delivered', 'cancel']),
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'email' => $faker->email,
                'phone' => $faker->phoneNumber,
                'country' => $faker->country,
                'post_code' => $faker->optional()->postcode,
                'address1' => $faker->address,
                'address2' => $faker->optional()->address,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}