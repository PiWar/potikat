<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        "uid",
        "user_email",
        "user_phone",
        "total_price",
        "pricings_id",
    ];

    public function pricings()
    {
        $pricings = explode(",", $this->pricings_id);
        $response =  [];
        foreach ($pricings as $pricing) {
            $response[] = Pricing::find($pricing);
        }
        return $response;
    }
}
