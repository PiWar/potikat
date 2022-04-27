<?php

namespace App\Repository;

use App\Http\Resources\OrderResource;
use App\Models\Order;
use App\Models\Pricing;
use Illuminate\Support\Str;

class OrderRepository implements Interfaces\IOrder
{

    public function store(array $data)
    {
        $data["uid"] = Str::random();
        $pricings = explode(",", $data["pricings_id"]);
        $data["total_price"] = 0;
        foreach ($pricings as $pricing) {
            $price = Pricing::find((int)$pricing)->price;
            $data["total_price"] += $price;
        }
        $order = Order::create($data);
        return OrderResource::make($order);
    }

    public function index()
    {
        return Order::all();
    }

    public function show(Order $order)
    {
        return OrderResource::make($order);
    }

    public function destroy(Order $order)
    {
        return $order->delete();
    }
}
