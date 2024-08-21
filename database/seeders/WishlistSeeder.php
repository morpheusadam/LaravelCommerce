<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class WishlistSeeder extends Seeder
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
        $cartIds = DB::table('carts')->pluck('id')->toArray();

        for ($i = 0; $i < 10; $i++) {
            $quantity = $faker->numberBetween(1, 10);
            $price = $faker->randomFloat(2, 10, 1000);
            $amount = $quantity * $price;

            DB::table('wishlists')->insert([
                'product_id' => $faker->randomElement($productIds),
                'cart_id' => $faker->optional()->randomElement($cartIds),
                'user_id' => $faker->optional()->randomElement($userIds),
                'price' => $price,
                'quantity' => $quantity,
                'amount' => $amount,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}