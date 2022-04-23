<?php

namespace Database\Seeders;

use App\Models\Size;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SizeSeeder extends Seeder
{
    private array $sizes = [
      ["category_id" => 1, "value" => "20 cm"],
      ["category_id" => 1, "value" => "25 cm"],
      ["category_id" => 1, "value" => "30 cm"],

      ["category_id" => 2, "value" => "0.3 л"],
      ["category_id" => 2, "value" => "0.5 л"],
      ["category_id" => 2, "value" => "1 л"],


      ["category_id" => 3, "value" => "100 г"],
      ["category_id" => 3, "value" => "250 г"],
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->sizes as $size) {
            Size::create($size);
        }
    }
}
