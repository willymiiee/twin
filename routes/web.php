<?php

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
    return view('Frontend/pages/homepage');
});
Route::get('/about', function () {
    return view('Frontend/pages/about');
});
Route::get('/team', function () {
    return view('Frontend/pages/team');
});
Route::get('/infrastructure', function () {
    return view('Frontend/pages/infrastructure');
});
Route::get('/product', function () {
    return view('Frontend/pages/product');
});

