<?php

namespace App\Http\Controllers;

use App\Http\Requests\SliderRequest;
use App\Models\Slider;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SliderController extends Controller
{


    public function sliders(){

        $sliders = Slider::all();
        return view('admin.slider.sliders')->with('sliders' ,$sliders);
    }




    public function addSlider(){

        return view('admin.slider.addSlider');
    }

    public function saveSlider(SliderRequest $request){

        try{

            $fileName = "";
            if ($request->hasFile('slider_image')) {

                $fileName = uploadImage('sliders', $request->slider_image);
            }
            $slider = Slider::create([
                'description1' => $request->description1,
                'description2' => $request->description2,
                'slider_image' => $fileName,
                'status'=>1,

            ]);

            return back()->with('status','The slider  has been successfully saved');

        }catch(Exception $ex){
            return redirect()->route('admin.slider.addslider')->with('status','The slider not saved try later');
        }


    }

    public function editSlider($id){

        $slider=Slider::find($id);

        if (!$slider){
            return redirect()->route('admin.slider.sliders')->with(['status' => 'This slider does not exist']);
        }

        return view('admin.slider.editslider')->with('slider',$slider);
    }

    public function updateSlider(SliderRequest $request , $id){

        try{
            $slider=Slider::find($id);


            DB::beginTransaction();

            if (!$slider){
                return redirect()->route('admin.slider.sliders')->with(['status' => 'This slider does not exist']);
            }

            $fileName = "";
            if ($request->hasFile('slider_image')) {


                $fileName = uploadImage('sliders', $request->slider_image);


                $slider ->update(['slider_image' => $fileName]);

            }

            $slider ->update([
                'description1' => $request->description1,
                'description2' => $request->description1,

                ]);


                DB::commit();
                return redirect()->route('admin.slider.sliders')->with('status','The slider  has been successfully updated');

            }catch(Exception $ex){

                DB::rollback();
                return redirect()->route('admin.slider.sliders')->with('status','The slider not updated try later');
            }

    }


    public function deleteSlider($id){
        try{

            $slider = Slider::find($id);
            if(!$slider){
                return redirect()->route('admin.slider.sliders')->with(['status' => 'This slider does not exist']);
            }

            $slider->delete();
            return redirect()->route('admin.slider.sliders')->with('status', 'The slider has been successfully deleted');

        }catch(Exception $ex){

            return redirect()->route('admin.slider.sliders')->with('status','The slider not deleted try later');
        }
    }



    public function activateSlider($id){

        try{
            $slider = Slider::find($id);

            if(!$slider){
                return redirect()->route('admin.slider.sliders')->with(['status' => 'This slider does not exist']);
            }

            $status = $slider -> status  ==0 ? 1 : 0;
            $slider -> update(['status' =>$status ]);
            return redirect()->route('admin.slider.sliders')->with('status', 'The slider status has been successfully changed');

        }catch(Exception $ex){
            return redirect()->route('admin.slider.sliders')->with('status','The slider status not chanhed try later');
        }

    }


}
