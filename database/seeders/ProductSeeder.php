<?php

namespace Database\Seeders;

use App\Models\Product;
use http\Url;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    private string $description = "at risus viverra adipiscing at in tellus integer feugiat scelerisque";


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $base_img_url = url("uploads\\");
        $products = [
            ["category_id" => 1, "img" => $base_img_url . "p1.png", "title" => "Салями", "description" => $this->description],
            ["category_id" => 1, "img" => $base_img_url . "p2.png", "title" => "Моцарелла", "description" => $this->description],
            ["category_id" => 1, "img" => $base_img_url . "p3.png", "title" => "Ранчо", "description" => $this->description],

            ["category_id" => 2, "img" => $base_img_url . "d1.png", "title" => "Sprite", "description" => $this->description],
            ["category_id" => 2, "img" => $base_img_url . "d2.png", "title" => "Cola", "description" => $this->description],
            ["category_id" => 2, "img" => $base_img_url . "d3.png", "title" => "Fanta", "description" => $this->description],

            ["category_id" => 3, "img" => $base_img_url . "c1.png", "title" => "Торт", "description" => $this->description],
            ["category_id" => 3, "img" => $base_img_url . "c2.png", "title" => "Панкейк", "description" => $this->description],
            ["category_id" => 3, "img" => $base_img_url . "c3.png", "title" => "Чизкейк", "description" => $this->description],
        ];
        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
