<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Product;
use App\Repository\Interfaces\IProduct;
use App\Repository\ProductRepository;
use JetBrains\PhpStorm\Pure;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    #[Pure] public function __construct(
        private IProduct $productRepository = new ProductRepository()
    )
    {
    }

    public function index()
    {
        return resJson(
            "all product",
            $this->productRepository->index(),
            Response::HTTP_OK,
        );
    }

    public function show(Product $product)
    {
        return resJson(
            "show product",
            $this->productRepository->show($product),
            Response::HTTP_OK
        );
    }

    public function store(ProductStoreRequest $request)
    {
        $data = $request->validated();
        return resJson(
            "store product",
            $this->productRepository->store($data),
            Response::HTTP_CREATED,
        );
    }

    public function destroy(Product $product)
    {
        return resJson(
            "destroy product",
            ["result" => $this->productRepository->destroy($product)],
            Response::HTTP_OK,
        );
    }

    public function update(ProductUpdateRequest $request, Product $product)
    {
        $data = $request->validated();
        return resJson(
            "update product",
            ["result" => $this->productRepository->update($data, $product)],
            Response::HTTP_OK,
        );
    }
}
