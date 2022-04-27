<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        "category_id",
        "img",
        "title",
        "description"
    ];

    public function pricing()
    {
        return $this->hasMany(Pricing::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
