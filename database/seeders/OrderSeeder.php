<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 5; $i++) {
            $order = [
                "uid" => Str::random(),
                "user_email" => Str::random(10) . "@gmail.com",
                "user_phone" => Str::random(11),
                "address" => Str::random(12),
                "total_price" => 1000,
                "pricings_id" => "1,2,3,4",
            ];
            Order::create($order);
        }
    }
}
