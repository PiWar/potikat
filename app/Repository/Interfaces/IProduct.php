<?php

namespace App\Repository\Interfaces;

use App\Models\Product;

interface IProduct {
    public function index();
    public function show(Product $product);
    public function destroy(Product $product);
    public function store(array $data);
    public function update(array $data, Product $product);
}
