<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function create()
    {
        return view('admin.blog.create');
    }

    public function store(Request $request)
    {
        $blog = new Blog();

        $blog->title = $request->title;
        $blog->slug = Str::slug($request->title);
        $blog->description = $request->description;
        $blog->status = $request->status;

        // image upload
        if($request->hasFile('image')){
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/blog'), $name);
            $blog->image = $name;
        }

        $blog->save();

        return back()->with('success','Blog Added');
    }
    public function index()
{
    $blogs = Blog::latest()->get();
    return view('admin.blog.index', compact('blogs'));
}

public function edit($id)
{
    $blog = Blog::findOrFail($id);
    return view('admin.blog.edit', compact('blog'));
}

public function update(Request $request, $id)
{
    $blog = Blog::findOrFail($id);

    $blog->title = $request->title;
    $blog->slug = Str::slug($request->title);
    $blog->description = $request->description;
    $blog->status = $request->status;

    if($request->hasFile('image')){
        $image = $request->file('image');
        $name = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('uploads/blog'), $name);
        $blog->image = $name;
    }

    $blog->save();

    return redirect()->route('blog.index')->with('success','Blog Updated');
}

public function delete($id)
{
    $blog = Blog::findOrFail($id);

    // delete image
    if($blog->image && file_exists(public_path('uploads/blog/'.$blog->image))){
        unlink(public_path('uploads/blog/'.$blog->image));
    }

    $blog->delete();

    return back()->with('success','Blog Deleted');
}
}