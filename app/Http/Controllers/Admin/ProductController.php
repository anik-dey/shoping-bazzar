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
           $filename=$image->getClientOriginalName();
           $image_resize= Image::make($image->getRealPath());
           $image_resize->resize(1070,1500);
           $image_resize->save(public_path('products/'.$filename));
           //$request->product_image->store('products', 'public');
           $data= array();
        //    $data['product_id']= 1;
           $data['product_name']= $request->product_name;
           $data['product_code']= $randomNumber;
           $data['product_des']= $request->product_des;
           $data['product_quantity']= $request->product_quantity;
           $data['product_price']= $request->product_price;
           $data['product_image']=$filename;
        //    $data['product_image']=$image_resize;
           $data['product_status']= $request->option;
           $data['category_id']= $request->category_id;
           $data['created_at']=Carbon::now();
           $data['updated_at']=Carbon::now();
           DB::connection()->enableQueryLog();
           //dd($data);
           DB::table('products')->insert($data);



        //    Product::create([
        //     'product_name' => $request->product_name,
        //     'product_code'  =>  $randomNumber,
        //     'product_des'  => $request->product_des,
        //     'product_quality'  => $request->product_quality,
        //     'product_price'  => $request->product_price,
        //     'product_image'  => $image_resize,
        //     'product_status'  => $request->option,
        //     'category_id'  => $request->category_id
        // ]);
        //     $product = new Product();
        //     $product->product_name = $request->product_name;
        //     $product->product_code =  $randomNumber;
        //     $product->product_des = $request->product_des;
        //     $product->product_quality = $request->product_quality;
        //     $product->product_price = $request->product_price;
        //     $product->product_image = $image_resize;
        //     $product->product_status = $request->option;
        //     $product->category_id = $request->category_id;
        //     $product->created_at = Carbon::now();
        //     $product->updated_at = Carbon::now();
        //    dd($product);
        //     $product->save();

            return redirect()->back()->with('success', 'Product has been created successfully.');
        }

    }
}
