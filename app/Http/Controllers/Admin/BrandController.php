<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        return view('admin.brand.index', compact('brands'));
    }

    public function create()
    {
        return view('admin.brand.create');
    }

    public function store(Request $request)
    {
        $logo = null;

        if ($request->hasFile('brand_logo')) {
            $logo = time().'.'.$request->brand_logo->extension();
            $request->brand_logo->move(public_path('uploads/brand'), $logo);
        }

        Brand::create([
            'brand_name' => $request->brand_name,
            'brand_description' => $request->brand_description,
            'brand_logo' => $logo,
            'status' => $request->status
        ]);

        return redirect()->route('brand.index')->with('success', 'Brand Added');
    }

    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin.brand.edit', compact('brand'));
    }

    public function update(Request $request, $id)
    {
        $brand = Brand::findOrFail($id);

        if ($request->hasFile('brand_logo')) {
            $logo = time().'.'.$request->brand_logo->extension();
            $request->brand_logo->move(public_path('uploads/brand'), $logo);
            $brand->brand_logo = $logo;
        }

        $brand->update([
            'brand_name' => $request->brand_name,
            'brand_description' => $request->brand_description,
            'status' => $request->status
        ]);

        return redirect()->route('brand.index')->with('success', 'Updated');
    }

    public function delete($id)
    {
        Brand::findOrFail($id)->delete();
        return redirect()->route('brand.index')->with('success', 'Deleted');
    }
}