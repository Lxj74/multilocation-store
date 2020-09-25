<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\LocationService;
use App\Services\ProductLocationService;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');
    }

    public function index(
        ProductService $productService,
        LocationService $locationService,
        ProductLocationService $productLocationService
    ) {
        $count = $productService->getCount();
        $products = $productService->getData();
        $locations = $locationService->getData();

        return view('admin.dashboard', compact('count', 'products', 'locations'));
    }
}
