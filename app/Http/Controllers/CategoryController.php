<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    // ✅ VIEW ALL DATA
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.view-category', compact('categories'));
    }

    // ✅ SHOW CREATE FORM
    public function create()
    {
        return view('admin.category.create');
    }

    // ✅ STORE DATA
    public function store(Request $request)

    {


        
    $request->validate([
    'cat_name' => 'required|max:255',
    'cat_description' => 'required|max:500',
    'status' => 'required'
],['cat_name.required'=>'please enter thr category name',
'cat_description.required'=>'please enter the description']);
        Category::create([
            'cat_name' => $request->cat_name,
            'cat_description' => $request->cat_description,
            'status' => $request->status
        ]);

        return redirect()->route('category.create')->with('success', 'Category Added Successfully');

       // return redirect('/category')->with('success', 'Category Added Successfully');
    }

    // ✅ SHOW EDIT FORM
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.edit', compact('category'));
    }

    // ✅ UPDATE DATA
    public function update(Request $request, $id)
    {
       $request->validate([
    'cat_name' => 'required|max:255',
    'cat_description' => 'required|max:500',
    'status' => 'required'
],['cat_name.required'=>'please enter thr category name',
'cat_description.required'=>'please enter the description']);   
    $category = Category::findOrFail($id);

        $category->update([
            'cat_name' => $request->cat_name,
            'cat_description' => $request->cat_description,
            'status' => $request->status
        ]);

         return redirect()->route('category.view')->with('success', 'Category Updated Successfully');
    }

    // ✅ DELETE DATA
    public function delete($id)
    {
        Category::findOrFail($id)->delete();
      return redirect()->route('category.view')->with('success', 'Category Deleted Successfully');
    }

}
