<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Validation\Rule;
use Illuminate\Support\Carbon;
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

            $product_image = $request->file('product_image');
            $input['product_image'] = time().'.'.$product_image->extension();
            $destinationPath = public_path('/products');
            $img = Image::make($product_image->path());
            $img->resize(1072, 1500, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$input['product_image']);
            $destinationPath = public_path('/products');
            $image->move($destinationPath, $input['product_image']);

            $product = new Product();
            $product->name = $request->product_name;
            $product->code =  $randomNumber;
            $product->des = $request->product_des;
            $product->quality = $request->product_quality;
            $product->price = $request->product_price;
            $product->image = "/public/products/" . $input['product_image'];
            $product->status = $request->option;
            $product->category_id = $request->category_id;
            $product->created_at = Carbon::now();
            $product->updated_at = Carbon::now();

            $product->save();
            return redirect()->back()->with('success', 'Product has been created successfully.');
        }

    }
}
