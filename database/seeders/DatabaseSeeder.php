<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Pricing;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            CategorySeeder::class,
            SizeSeeder::class,
            ProductSeeder::class,
            PricingSeeder::class,
            OrderSeeder::class,
            AdminSeeder::class,
        ]);
    }
}
