<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Validation\Rule;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Image;

class ProductController extends Controller
{
    Public function createProduct(Request $request)
    {
        $categories=Category::orderby('name', 'asc')->get();
        if($request->method()=='GET')
        {
            return view('admin.create-product',compact('categories'));
        }

        if($request->method()=='POST')
        {
            //dd($request->all());
            $validator = $request->validate([
                'product_name'      => 'required',
                'product_des'       => 'required',
                'product_quantity'  => 'required',
                'category_id'       => 'required',
                'product_price'     => 'required|numeric',
                'option'            => 'required',
                'product_image'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'

            ]);
            $randomNumber = random_int(100000, 999999);

           $image= $request->product_image;
           $extension=$image->getClientOriginalName();
           $filename=time().'.'.$extension;
           $image_resize= Image::make($image->getRealPath());
           $image_resize->resize(1070,1500);
           $image_resize->save(public_path('products/'.$filename));
           $data= array();
           $data['product_name']= $request->product_name;
           $data['product_code']= $randomNumber;
           $data['product_des']= $request->product_des;
           $data['product_quantity']= $request->product_quantity;
           $data['product_price']= $request->product_price;
           $data['product_image']=$filename;
           $data['product_status']= $request->option;
           $data['category_id']= $request->category_id;
           $data['created_at']=Carbon::now();
           $data['updated_at']=Carbon::now();
           DB::connection()->enableQueryLog();
           DB::table('products')->insert($data);

            return redirect()->back()->with('success', 'Product has been created successfully.');
        }

    }
}
