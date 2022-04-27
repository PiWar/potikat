<?php

namespace App\Repository;

use App\Models\Pricing;
use App\Repository\Interfaces\IPricing;

class PricingRepository implements IPricing
{
    public function store(array $data, int $product_id)
    {
        $sizes = explode(",", $data["sizes"]);
        $prices = explode(",", $data["prices"]);
        for ($i = 0; $i < count($sizes); $i++) {
            Pricing::create([
                "product_id" => $product_id,
                "size_id" => $sizes[$i],
                "price" => $prices[$i],
            ]);
        }
    }

    public function destroy(Pricing $pricing)
    {
        return $pricing->delete();
    }
}
