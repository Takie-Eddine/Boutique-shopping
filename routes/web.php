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
Route::get('/admin','AdminController@admin')->name('admin.dashboard');


//----------------Category--------------------\\
Route::get('/addcategory','CategoryController@addCategory')->name('admin.category.addcategory');
Route::post('/savecategory','CategoryController@saveCategory')->name('admin.category.savecategory');
Route::get('/editcategory/{id}','CategoryController@editCategory')->name('admin.category.editcategory');
Route::post('/updatecategory/{id}','CategoryController@updateCategory')->name('admin.category.updatecategory');
Route::get('/deletecategory/{id}','CategoryController@deleteCategory')->name('admin.category.deletecategory');
Route::get('/categories','CategoryController@categories')->name('admin.category.categories');


//----------------Sub-Category--------------------\\
Route::get('/addsubcategory','SubCategoryController@addSubCategory')->name('admin.subcategory.addsubcategory');
Route::post('/savesubcategory','SubCategoryController@saveSubCategory')->name('admin.subcategory.savesubcategory');
Route::get('/editsubcategory/{id}','SubCategoryController@editSubCategory')->name('admin.subcategory.editsubcategory');
Route::post('/updatesubcategory/{id}','SubCategoryController@updateSubCategory')->name('admin.subcategory.updatesubcategory');
Route::get('/deletesubcategory/{id}','SubCategoryController@deleteSubCategory')->name('admin.subcategory.deletesubcategory');
Route::get('/subcategories','SubCategoryController@subcategories')->name('admin.subcategory.subcategories');



Route::get('/addslider','SliderController@addSlider')->name('admin.slider.addslider');
Route::get('/sliders','SliderController@sliders')->name('admin.slider.sliders');

Route::get('/addproduct','ProductController@addProduct')->name('admin.product.addproduct');
Route::get('/products','ProductController@products')->name('admin.product.products');

Route::get('/orders','OrderController@orders')->name('admin.order.orders');




//----------------Client --------------------\\
Route::get('/','ClientController@home')->name('');

Route::get('/shop','ClientController@shop')->name('');

Route::get('/cart','ClientController@cart')->name('');

Route::get('/checkout','ClientController@checkout')->name('');

Route::get('/login','ClientController@login')->name('');

Route::get('/signup','ClientController@signup')->name('');







