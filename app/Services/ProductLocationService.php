<?php
namespace App\Services;

use App\Models\ProductLocation;

class ProductLocationService
{
    public function getData($groupBy){
        $data = ProductLocation::selectRaw('product_id, location_id, sum(quantity) as sum')->groupBy(['product_id', 'location_id'])
            ->with('products', 'locations')->get();

        return $data;
    }

    public function sortedData($groupBy ){
        $data = ProductLocation::selectRaw('product_id, location_id, sum(quantity) as sum')->groupBy(['product_id', 'location_id'])
            ->with('products', 'locations')->orderBy('code', 'DESC')->get();

        return $data;
    }

}
