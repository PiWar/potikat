<?php

namespace App\Http\Controllers;

use App\Http\Requests\PricingStoreRequest;
use App\Models\Pricing;
use App\Models\Product;
use App\Repository\Interfaces\IPricing;
use App\Repository\PricingRepository;
use JetBrains\PhpStorm\Pure;
use Symfony\Component\HttpFoundation\Response;

class PricingController extends Controller
{
    #[Pure] public function __construct(
        private IPricing $pricingRepository = new PricingRepository(),
    )
    {}
    public function destroy(Pricing $pricing)
    {
        return resJson(
            "destroy pricing",
            $this->pricingRepository->destroy($pricing),
            Response::HTTP_OK,
        );
    }

    public function store(PricingStoreRequest $request, Product $product)
    {
        $data = $request->validated();
        $this->pricingRepository->store($data, $product->id);
        return resJson(
            "store pricing",
            [],
            Response::HTTP_CREATED,
        );
    }


}
