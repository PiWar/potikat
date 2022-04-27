<?php

namespace App\Repository;

use App\Http\Resources\ProductIndexResource;
use App\Http\Resources\ProductResource;
use App\Models\Category;
use App\Models\Product;
use App\Repository\Interfaces\IPricing;
use App\Repository\Interfaces\IProduct;
use Illuminate\Support\Str;

class ProductRepository implements IProduct
{
    public function __construct(
        private IPricing $pricingRepository = new PricingRepository()
    )
    {
    }

    public function index()
    {
        return ProductIndexResource::collection(Category::all());
    }

    public function show(Product $product)
    {
        return ProductResource::make($product);
    }

    public function destroy(Product $product)
    {
        return $product->delete();
    }

    public function store(array $data)
    {
        $img = $data["img"];
        $img_name = Str::random(8) . $img->getClientOriginalName();
        $img->move(public_path("uploads"), $img_name);
        $data["img"] = url("uploads\\") . $img_name;
        if ($product = Product::create($data)) {
            $this->pricingRepository->store($data, $product->id);
            return ProductResource::make($product);
        }
        return [
            "errors" => ["message" => "invalid"]
        ];
    }

    public function update(array $data, Product $product)
    {
        if (array_key_exists("img", $data)) {
            $img = $data["img"];
            $img_name = Str::random(8) . $img->getClientOriginalName();
            $img->move(public_path("uploads"), $img_name);
            $data["img"] = url("uploads\\") . $img_name;
        }
        $product->update($data);
        return ProductResource::make($product);


    }
}
