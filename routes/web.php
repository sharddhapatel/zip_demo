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


Route::get('/', function () {
    return view('product');
});
Route::get('product', function () {
    return view('demo');
});

route::post('insproduct','Productcontroller@productimg');
route::get('downloadZip','Productcontroller@downloadZip');
route::get('show','Productcontroller@show');
