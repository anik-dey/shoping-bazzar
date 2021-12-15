<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
class BaseController extends Controller
{
    public function index()
    {
        $products= Product::where('product_status', 'Active')->get();
        return view('pages.landing', compact('products'));
    }

    public function listProduct($id)
    {
        $products= Product::where('category_id', $id)->where('product_status','Active')->get();
        return view('users.products_list', compact('products'));
    }
}
