<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    Public function createProduct()
    {
        $categories=Category::orderby('name', 'asc')->get();
        return view('admin.create-product',compact('categories'));
    }
}
