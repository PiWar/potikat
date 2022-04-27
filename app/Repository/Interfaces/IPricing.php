<?php

namespace App\Repository\Interfaces;

use App\Models\Pricing;
use App\Models\Product;

interface IPricing {
    public function store(array $data, int $product_id);
    public function destroy(Pricing $pricing);
}
