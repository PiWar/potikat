<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PricingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        self::withoutWrapping();
        return [
            "id" => $this->id,
            "product_id" => $this->product_id,
            "price" => $this->price,
            "size" => $this->size->value,
        ];
    }
}
