<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ProductLocationService;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function unsorted(
        ProductLocationService $productLocationService
    )
    {
       $data = $productLocationService->getData(['product_id', 'location_id']);

        return view('admin.product.unsort', compact('data'));
    }

    public function sorted(
        ProductLocationService $productLocationService
    )
    {
        $data = $productLocationService->getData(['product_id', 'location_id']);

        return view('admin.product.unsort', compact('data'));
    }


}
