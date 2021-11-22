<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function createCategory(Request $request)
    {
        $categories = Category::where('parent_id', null)->orderby('name', 'asc')->get();
        if($request->method()=='GET')
        {
            return view('admin.create-category', compact('categories'));
        }
        if($request->method()=='POST')
        {
            $validator = $request->validate([
                'name'      => 'required',
                'slug'      => 'required|unique:categories',
                'parent_id' => 'nullable|numeric'
            ]);

            Category::create([
                'name' => $request->name,
                'slug' => $request->slug,
                'parent_id' =>$request->parent_id
            ]);

            return redirect()->back()->with('success', 'Category has been created successfully.');
        }

    }

    public function showCategory()
    {
       // $categories = Category::where('parent_id', null)->orderby('name', 'asc')->get();
       $categories= Category::orderby('name', 'asc')->get();
        return view('admin.show-category',compact('categories'));
    }

    public function editCategory( Request $request, $id)
    {
        $categories=Category::find($id);
       return view('admin.edit-category',compact('categories'));
    }

    public function deleteCategory($id)
    {

    }
}
