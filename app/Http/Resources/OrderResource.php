<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "uid" => $this->uid,
            "user_email" => $this->user_email,
            "user_phone" => $this->user_phone,
            "total_price" => $this->total_price,
            "products" => PricingProductResource::collection($this->pricings()),
        ];
    }
}
