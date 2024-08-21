<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            BrandSeeder::class,
            BannerSeeder::class,
            CategorySeeder::class,
            ProductSeeder::class,
            PostCategorySeeder::class,
            PostTagSeeder::class,
            PostSeeder::class, // Assuming you have a PostSeeder
            MessageSeeder::class,
            ShippingSeeder::class,
            OrderSeeder::class,
            CartSeeder::class,
            NotificationSeeder::class,
            CouponSeeder::class,
            WishlistSeeder::class,
            ProductReviewSeeder::class,
            PostCommentSeeder::class,
        ]);
    }
}