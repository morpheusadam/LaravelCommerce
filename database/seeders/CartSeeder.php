<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CartSeeder extends Seeder
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
        $orderIds = DB::table('orders')->pluck('id')->toArray();

        for ($i = 0; $i < 10; $i++) {
            $quantity = $faker->numberBetween(1, 10);
            $price = $faker->randomFloat(2, 10, 1000);
            $amount = $quantity * $price;

            DB::table('carts')->insert([
                'product_id' => $faker->randomElement($productIds),
                'order_id' => $faker->optional()->randomElement($orderIds),
                'user_id' => $faker->optional()->randomElement($userIds),
                'price' => $price,
                'status' => $faker->randomElement(['new', 'progress', 'delivered', 'cancel']),
                'quantity' => $quantity,
                'amount' => $amount,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}