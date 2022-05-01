<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PricingWithProductResource extends JsonResource
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
            "price" => $this->price,
            "size" => $this->size->value,
            "title" => $this->product->title,
            "img" => $this->product->img
        ];
    }
}
