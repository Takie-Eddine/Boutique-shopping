<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;

class CategoryController extends Controller
{


    public function categories(){

        $categories = Category::all()-> whereNull('parent_id');
        return view('admin.category.categories')->with('categories' , $categories);
    }




    public function addCategory(){

        return view('admin.category.addCategory');

    }

    public function saveCategory(CategoryRequest $request){
        try{
            if($request){

                $category = new Category();
                $category->category_name = $request -> category_name ;
                $category->save();

                return back()->with('status','The category name has been successfully saved');
            }
        }catch(Exception $ex){
            return back()->with('status','The category name not saved try later');
            return $ex ;
        }


    }

    public function editCategory($id){

        $category = Category::find($id);
        return view('admin.subcategory.editsubcategory')->with('category',$category);

    }

    public function updateCategory($id,CategoryRequest $request){
        //return $request;
        try{
            $category = Category::find($id);
            if (!$category){
                return redirect()->route('admin.category.categories')->with(['status' => 'This category does not exist']);
            }
            //return $request;
            $category -> category_name = $request -> category_name ;
            $category -> update();

            return redirect()->route('admin.category.categories')->with('status', 'The category name has been successfully updated');

        }catch(Exception $ex){

            return redirect()->route('admin.category.categories')->with('status','The category name not updated try later');

        }
    }

    public function deleteCategory($id){

        try{

            $category = Category::find($id);


            if(!$category){
                return redirect() -> route('admin.category.categories')->with(['status' => 'This category does not exist']);
            }

            $category->delete();
            return redirect()->route('admin.category.categories')->with('status', 'The category has been successfully deleted');


        }catch(Exception $ex){

            return redirect()->route('admin.category.categories')->with('status','The category not deleted try later');

        }
    }


}
