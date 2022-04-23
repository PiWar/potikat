<?php

namespace Database\Seeders;

use App\Models\Pricing;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PricingSeeder extends Seeder
{
    private array $pricings = [
        ['product_id' => 1, 'size_id' => 1, "price" => 400],
        ['product_id' => 2, 'size_id' => 2, "price" => 400],
        ['product_id' => 3, 'size_id' => 3, "price" => 400],

        ['product_id' => 4, 'size_id' => 4, "price" => 100],
        ['product_id' => 5, 'size_id' => 5, "price" => 100],
        ['product_id' => 6, 'size_id' => 6, "price" => 100],

        ['product_id' => 7, 'size_id' => 7, "price" => 300],
        ['product_id' => 8, 'size_id' => 8, "price" => 300],
        ['product_id' => 9, 'size_id' => 8, "price" => 300],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->pricings as $pricing) {
            Pricing::create($pricing);
        }
    }
}
