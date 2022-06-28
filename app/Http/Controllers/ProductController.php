<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function addProduct(){
        return view('admin.product.addProduct');
    }

    public function products(){
        return view('admin.product.products');
    }
}
