<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator,Redirect,Response,File;
use App\Product;
use Auth;
use DB;

class ImageUploadController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {   
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $product = new Product;
        $product->name = $request->input('name');
        $product->mrp = $request->input('mrp');
        $product->size = $request->input('size');
        $product->color = $request->input('color');
        $product->dimensions = $request->input('dimension');
        $dimensions = explode(',', $product->dimensions);
        $product->status = false;
        $product->user_id = Auth::user()->id;
        if($product->size == "S" and $dimensions[0] =="8" and $dimensions[1] =="6" and $dimensions[2] =="7" and $dimensions[3] =="250") {
            $product->status = true;
        } else if($product->size == "M" and $dimensions[0] =="9" and $dimensions[1] =="7" and $dimensions[2] =="8" and $dimensions[3] =="250") {
            $product->status = true;
        } else if($product->size == "L" and $dimensions[0] =="10" and $dimensions[1] =="7" and $dimensions[2] =="12" and $dimensions[3] =="250") {
            $product->status = true;
        } else if($product->size == "XL" and $dimensions[0] =="12" and $dimensions[1] =="9" and $dimensions[2] =="13" and $dimensions[3] =="500") {
            $product->status = true;
        } else if($product->size == "XXL" and $dimensions[0] =="12" and $dimensions[1] =="11" and $dimensions[2] =="15" and $dimensions[3] =="750") {
            $product->status = true;
        } else if($product->size == "" and $dimensions[0] =="8" and $dimensions[1] =="6" and $dimensions[2] =="7" and $dimensions[3] =="500") {
            $product->status = true;
        }else if($product->size == "" and $dimensions[0] =="10" and $dimensions[1] =="7" and $dimensions[2] =="12" and $dimensions[3] =="500") {
            $product->status = true;
        }else if($product->size == "" and $dimensions[0] =="12" and $dimensions[1] =="11" and $dimensions[2] =="15" and $dimensions[3] =="1000") {
            $product->status = true;
        } else {
            $product->status = false;
        }

        $product->images = "";
        $images = array();
        if($product->status == true) { 
            $destinationPath = public_path('/images/');
            $files = $request->file('image');
            $i = 1;
            foreach($files as $file){
                $profileImage = date('YmdHis') . "." . $product->name . $i;
                $file->move($destinationPath, $profileImage);
                array_push($images, $profileImage);
                $i++;
            }
            $product->images = implode('|', $images);
        }
        $product->save();
        return redirect()->to('/productList');
    }
 
    public function productList(Request $request)
    {
        $user_id = Auth::user()->id;
        $products =DB::table('products')->select("*")->where("user_id","=",$user_id)->get();
        // dd($products);
        return view('products', ['products'=>$products]);
        
    }
}
