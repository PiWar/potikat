<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            "category" => $this->category->name,
            "img" => $this->img,
            "title" => $this->title,
            "description" => $this->description,
            "pricing" => PricingResource::collection($this->pricing),
        ];
    }
}
