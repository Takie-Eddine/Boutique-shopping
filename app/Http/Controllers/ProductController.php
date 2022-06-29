<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductCategories;
use App\Models\Size;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use File;

class ProductController extends Controller
{


    public function products(){
        $products = Product::all();
        return view('admin.product.products')->with('products' ,$products);
    }




    public function addProduct(){

        $data = [];
        $data ['categories'] = Category::whereNull('parent_id')-> get();
        $data ['subcategories'] = Category::whereNotNull('parent_id') ->get();
        $data ['sizes'] = Size::all();
        $data ['colors'] = Color::all();

        return view('admin.product.addproduct', $data);
    }



    public function saveProduct(ProductRequest $request){
        try{
            if($request){

                $fileName = "";
                if ($request->hasFile('product_image')) {

                    $fileName = uploadImage('products', $request->product_image);
                }

                DB::beginTransaction();
                $product = Product::create([
                    'product_name' => $request->product_name,
                    'product_price' => $request->product_price,
                    'product_image' => $fileName,
                    'qty' => $request->qty,
                    'product_color' => json_encode( $request->input('color')),
                    'product_size' => json_encode( $request->input('size')),
                    'status'=>1,
                ]);

                $product->categories()->attach($request->categories);

                $product->categories()->attach($request->subcategories);

                DB::commit();
                return back()->with('status','The product  has been successfully saved');

            }
        }catch(Exception $ex){
            DB::rollback();
            return redirect()->route('admin.product.addproduct')->with('status','The product not saved try later');
        }


    }

    public function editProduct($id){

        $product=Product::find($id);

        if (!$product){
            return redirect()->route('admin.product.products')->with(['status' => 'This product does not exist']);
        }

        $data = [];
        /*$data ['categories'] = Category::whereNull('parent_id')-> get();
        $data ['subcategories'] = Category::whereNotNull('parent_id') ->get();*/
        $data ['sizes'] = Size::all();
        $data ['colors'] = Color::all();

        return view('admin.product.editproduct',$data)->with('product',$product);

    }


    public function updateProduct(ProductRequest $request , $id){

        try{
            $product=Product::find($id);


            DB::beginTransaction();

            if (!$product){
                return redirect()->route('admin.product.products')->with(['status' => 'This product does not exist']);
            }

            $fileName = "";
            if ($request->hasFile('product_image')) {


                $fileName = uploadImage('products', $request->product_image);


                $product ->update(['product_image' => $fileName]);

            }

            $product ->update([
                'product_name' => $request->product_name,
                'product_price' => $request->product_price,
                'qty' => $request->qty,
                'product_color' => json_encode( $request->input('color')),
                'product_size' => json_encode( $request->input('size')),
                ]);


                DB::commit();
                return redirect()->route('admin.product.products')->with('status','The product  has been successfully updated');

            }catch(Exception $ex){

                DB::rollback();
                return redirect()->route('admin.product.products')->with('status','The product not updated try later');
            }



    }


    public function deleteProduct($id){

        try{

            $product = Product::find($id);
            if(!$product){
                return redirect()->route('admin.product.products')->with(['status' => 'This product does not exist']);
            }

            $product->delete();
            return redirect()->route('admin.product.products')->with('status', 'The product has been successfully deleted');

        }catch(Exception $ex){

            return redirect()->route('admin.product.products')->with('status','The product not deleted try later');
        }

    }

    public function activateProduct($id){

        try{
            $product = Product::find($id);

            if(!$product){
                return redirect()->route('admin.product.products')->with(['status' => 'This product does not exist']);
            }

            $status = $product -> status  ==0 ? 1 : 0;
            $product -> update(['status' =>$status ]);
            return redirect()->route('admin.product.products')->with('status', 'The product status has been successfully changed');

        }catch(Exception $ex){
            return redirect()->route('admin.product.products')->with('status','The product status not chanhed try later');
        }


    }
}
