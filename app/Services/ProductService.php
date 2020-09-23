<?php
namespace App\Services;

use App\Models\Product;

class ProductService
{
    public function getCount(){
        $count = Product::all()->count();

        return $count;
    }

    public function getData()
    {
        $product = Product::all();

        return $product;
    }

}
