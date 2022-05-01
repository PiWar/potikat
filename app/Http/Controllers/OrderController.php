<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderStoreRequest;
use App\Http\Requests\PricingStoreRequest;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use App\Repository\Interfaces\IOrder;
use App\Repository\OrderRepository;
use Symfony\Component\HttpFoundation\Response;

class OrderController extends Controller
{
    public function __construct(
       private IOrder $orderRepository = new OrderRepository(),
    )
    {}
    public function index()
    {
        return resJson(
            "all order",
            $this->orderRepository->index(),
            Response::HTTP_OK,
        );
    }

    public function destroy(Order $order)
    {
        return resJson(
            "destroy order",
            $this->orderRepository->destroy($order),
            Response::HTTP_OK,
        );
    }

    public function show(Order $order)
    {
        return resJson(
            "show order",
            $this->orderRepository->show($order),
            Response::HTTP_OK,
        );
    }

    public function store(OrderStoreRequest $request)
    {
        $data = $request->validated();
        return resJson(
            "store order",
            $this->orderRepository->store($data),
            Response::HTTP_OK,
        );
    }

    public function showProduct(Order $order){
        return resJson(
            "show order product",
            $this->orderRepository->showProduct($order),
            Response::HTTP_OK,
        );
    }
}
