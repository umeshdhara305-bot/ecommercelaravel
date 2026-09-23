<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['category','brand'])->get();
        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();

        return view('admin.product.create', compact('categories','brands'));
    }

    public function store(Request $request)
    {
        $imageName = null;

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/products'), $imageName);
        }

    Product::create([
    'product_name' => $request->product_name,
    'category_id' => $request->category_id,
    'brand_id' => $request->brand_id,
    'price' => $request->price,
    'image' => $imageName,
    'description' => $request->description,
    'status' => $request->status,
    'featured' => $request->has('featured'),
    'recommended' => $request->has('recommended'),
]);

        return redirect()->route('product.index')->with('success','Product Added');
    }
    public function edit($id)
{
    $product = Product::findOrFail($id);
    $categories = Category::all();
    $brands = Brand::all();

    return view('admin.product.edit', compact('product','categories','brands'));
}

public function update(Request $request, $id)
{
    $product = Product::findOrFail($id);

    if ($request->hasFile('image')) {
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('uploads/products'), $imageName);

        $product->image = $imageName;
    }

    $product->update([
    'product_name' => $request->product_name,
    'category_id' => $request->category_id,
    'brand_id' => $request->brand_id,
    'price' => $request->price,
    'description' => $request->description,
    'status' => $request->status,
    'featured' => $request->has('featured'),
    'recommended' => $request->has('recommended'),
]);

    return redirect()->route('product.index')->with('success','Product Updated');
}

public function delete($id)
{
    Product::findOrFail($id)->delete();
    return redirect()->route('product.index')->with('success','Product Deleted');
}
}