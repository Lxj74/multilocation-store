<?php

namespace App\Http\Controllers;
use App\Models\Location;
use App\Services\LocationService;
use App\Services\ProductLocationService;
use App\Services\ProductService;
use Auth;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index(
        ProductService $productService,
        LocationService $locationService,
        ProductLocationService $productLocationService
    ) {
        $count = $productService->getCount();
        $products = $productService->getData();
        $locations = $locationService->getData();
    }

    public function logout()
    {
      Auth::logout();
    }
}
