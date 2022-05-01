<?php

namespace App\Repository\Interfaces;

use App\Models\Order;

interface IOrder {
    public function store(array $data);
    public function index();
    public function show(Order $order);
    public function destroy(Order $order);
    public function showProduct(Order $order);
}
