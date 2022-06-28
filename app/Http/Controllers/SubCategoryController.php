<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubCategoryRequest;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function subcategories(){

        $subcategories = Category::all()-> whereNotNull('parent_id');
        return view('admin.subcategory.subcategories')->with('subcategories' , $subcategories);

    }


    public function addSubCategory(){
        $categories =   Category::all()-> whereNull('parent_id');
        return view('admin.subcategory.addsubcategory')->with('categories' , $categories);
    }

    public function saveSubCategory(SubCategoryRequest $request){



            if($request){
                $category = Category::create($request->except('_token'));
                return back()->with('status','The category  has been successfully saved');
            }


    }

    public function editSubCategory($id){

        $category = Category::find($id);

        if (!$category){
            return redirect()->route('admin.subcategory.subcategories')->with(['status' => 'This category does not exist']);
        }

        $categories = Category::all()->whereNull('parent_id');


        return view('admin.subcategory.editsubcategory', compact('category','categories'));

    }


    public function updateSubCategory(SubCategoryRequest $request,$id){

        try{
            $category = Category::find($id);
            if (!$category){
                return redirect()->route('admin.subcategory.subcategories')->with(['status' => 'This category does not exist']);
            }
            //return $request;

            $category -> update($request->all());

            return redirect()->route('admin.subcategory.subcategories')->with('status', 'The category name has been successfully updated');

        }catch(Exception $ex){

            return redirect()->route('admin.subcategory.subcategories')->with('status','The category name not updated try later');

        }

    }




    public function deleteSubCategory($id){
        try{

            $category = Category::find($id);


            if(!$category){
                return redirect() -> route('admin.subcategory.subcategories')->with(['status' => 'This category does not exist']);
            }

            $category->delete();
            return redirect()->route('admin.subcategory.subcategories')->with('status', 'The category has been successfully deleted');


        }catch(Exception $ex){

            return redirect()->route('admin.subcategory.subcategories')->with('status','The category not deleted try later');

        }
    }
}
