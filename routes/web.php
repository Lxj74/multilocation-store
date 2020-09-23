<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/login/admin','Auth\LoginController@showAdminLoginForm')->name('admin.login');
Route::post('/login/admin','Auth\LoginController@adminLogin')->name('admin');
Route::get('/admin/logout', 'Auth\LoginController@getLogout')->name('admin.logout');

Route::group(['prefix' => 'admin','as' => 'admin.','namespace' => 'Admin', 'middleware' => ['auth:admin']], function (){
    Route::get('dashboard','DashboardController@index')->name('dashboard');
    Route::get('home','AdminController@index')->name('home');
    Route::get('/products/sorted', 'ProductController@sorted')->name('productsSorted');
    Route::get('/products/unsorted', 'ProductController@unsorted')->name('productsUnsorted');
});

Route::get('/clear', function (){
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    return 'Cache cleared';
});

if(!function_exists('pr')){
    function pr($data){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }
}

