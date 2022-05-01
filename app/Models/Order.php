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
        "address",
        "total_price",
        "pricings_id",
    ];

    public function pricings()
    {
        $pricings = explode(",", $this->pricings_id);
        if($pricings[count($pricings) - 1] == ""){
            unset($pricings[count($pricings) - 1]);
        }
        $response =  [];
        foreach ($pricings as $pricing) {
            $result = Pricing::query()->find($pricing);
            if ($result) $response[] = $result;

        }
        return $response;
    }
}
