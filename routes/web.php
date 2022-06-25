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
//----------------Admin--------------------\\
Route::get('/admin','AdminController@admin');

Route::get('/addcategory','CategoryController@addCategory');
Route::get('/categories','CategoryController@categories');

Route::get('/addslider','SliderController@addSlider');
Route::get('/sliders','SliderController@sliders');

Route::get('/addproduct','ProductController@addProduct');
Route::get('/products','ProductController@products');

Route::get('/orders','OrderController@orders');




//----------------Client --------------------\\
Route::get('/','ClientController@home');

Route::get('/shop','ClientController@shop');

Route::get('/cart','ClientController@cart');

Route::get('/checkout','ClientController@checkout');

Route::get('/login','ClientController@login');

Route::get('/signup','ClientController@signup');







