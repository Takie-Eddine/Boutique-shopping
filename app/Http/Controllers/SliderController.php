<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function addSlider(){

        return view('admin.slider.addSlider');
    }

    public function sliders(){

        return view('admin.slider.sliders');
    }
}
