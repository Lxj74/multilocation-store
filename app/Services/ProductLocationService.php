<?php
namespace App\Services;

use App\Models\ProductLocation;
use Illuminate\Support\Facades\DB;

class ProductLocationService
{
    public function getData(){
        $data = ProductLocation::selectRaw('product_id, location_id, sum(quantity) as sum')->groupBy(['product_id', 'location_id'])
            ->with('products', 'locations')->get();

        return $data;
    }

    public function getSortedData(){
        $data = ProductLocation::select('product_id','location_id',DB::raw('sum(quantity) as sum'))
            ->groupBy(['product_id','location_id'])
            ->with('products', 'locations')
            ->orderBy('product_id')
            ->get();

        $data = $data->groupBy(function ($item){
            return $item['products']['name'];
        });

        return $data;
    }

}
