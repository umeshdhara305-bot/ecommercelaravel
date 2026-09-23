<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
    use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Setting;
use App\Models\Blog;
use App\Models\Comment;

class FrontendController extends Controller
{

public function submitComment(Request $request, $blog_id)
{
    $validated = $request->validate([
        'name' => 'required|string|max:100',
        'email' => 'required|email|max:150',
        'website' => 'nullable|string|max:255',
        'message' => 'required|string|max:2000',
    ]);

    $blog = Blog::where('status', 1)
        ->findOrFail($blog_id);

    Comment::create([
        'blog_id' => $blog->id,
        'name' => $validated['name'],
        'email' => $validated['email'],
        'website' => $validated['website'] ?? null,
        'message' => $validated['message'],
        'approved' => false,
    ]);

    return redirect()
        ->route('blog.detail', $blog->slug)
        ->with('success', 'Your comment has been submitted and is waiting for approval.');
}


public function index()
{
    // Featured products
    $featuredProducts = Product::where('status', 1)
        ->where('featured', 1)
        ->latest()
        ->get();

    // Recommended products
    $recommendedProducts = Product::where('status', 1)
        ->where('recommended', 1)
        ->latest()
        ->get();

    // Active categories + their active products
    $categories = Category::where('status', 1)
        ->with(['products' => function ($query) {
            $query->where('status', 1)
                  ->latest();
        }])
        ->get();

    // Active brands
    $brands = Brand::where('status', 1)->get();

    return view('frontend.index', compact(
        'featuredProducts',
        'recommendedProducts',
        'categories',
        'brands'
    ));

}
public function contact()
{
    $setting = Setting::first();
    return view('frontend.contact', compact('setting'));
}


public function blogs()
{
    $blogs = Blog::where('status', 1)
        ->latest()
        ->paginate(5);

    $categories = Category::where('status', 1)
        ->with(['products' => function ($query) {
            $query->where('status', 1);
        }])
        ->get();

    $brands = Brand::where('status', 1)
        ->with(['products' => function ($query) {
            $query->where('status', 1);
        }])
        ->get();

    return view('frontend.blog', compact(
        'blogs',
        'categories',
        'brands'
    ));
}

public function blogDetail($slug)
{
    $blog = Blog::where('status', 1)
        ->where('slug', $slug)
        ->firstOrFail();

    // Categories
    $categories = Category::where('status', 1)
        ->with(['products' => function ($query) {
            $query->where('status', 1);
        }])
        ->get();

    // Brands
    $brands = Brand::where('status', 1)
        ->with(['products' => function ($query) {
            $query->where('status', 1);
        }])
        ->get();

    // Approved comments
    $comments = $blog->comments()
        ->where('approved', 1)
        ->latest()
        ->get();

    // Previous blog
    $previousBlog = Blog::where('status', 1)
        ->where('id', '<', $blog->id)
        ->latest('id')
        ->first();

    // Next blog
    $nextBlog = Blog::where('status', 1)
        ->where('id', '>', $blog->id)
        ->oldest('id')
        ->first();

    return view('frontend.blog-detail', compact(
        'blog',
        'categories',
        'brands',
        'comments',
        'previousBlog',
        'nextBlog'
    ));
}

public function shop()
{
    $products = Product::where('status', 1)
        ->with(['category', 'brand'])
        ->latest()
        ->paginate(9);

    $categories = Category::where('status', 1)
        ->with(['products' => function ($query) {
            $query->where('status', 1);
        }])
        ->get();

    $brands = Brand::where('status', 1)
        ->with(['products' => function ($query) {
            $query->where('status', 1);
        }])
        ->get();

    return view('frontend.shop', compact(
        'products',
        'categories',
        'brands'
    ));
}

public function productDetails($id)
{
    $product = Product::with(['category', 'brand'])
        ->where('status', 1)
        ->findOrFail($id);

    $categories = Category::where('status', 1)
        ->with(['products' => function ($query) {
            $query->where('status', 1);
        }])
        ->get();

    $brands = Brand::where('status', 1)
        ->with(['products' => function ($query) {
            $query->where('status', 1);
        }])
        ->get();

    $recommendedProducts = Product::where('status', 1)
        ->where('recommended', 1)
        ->where('id', '!=', $product->id)
        ->latest()
        ->get();

    return view('frontend.product-details', compact(
        'product',
        'categories',
        'brands',
        'recommendedProducts'
    ));
}


public function categoryProducts($id)
{
    $categories = Category::where('status',1)->get();
    $brands = Brand::where('status',1)->get();

    $products = Product::where('category_id', $id)
                        ->where('status',1)
                        ->latest()
                        ->get();

    $title = Category::findOrFail($id)->cat_name;

    return view('frontend.products', compact(
        'products',
        'categories',
        'brands',
        'title'
    ));
}

public function brandProducts($id)
{
    $categories = Category::where('status',1)->get();
    $brands = Brand::where('status',1)->get();

    $products = Product::where('brand_id', $id)
                        ->where('status',1)
                        ->latest()
                        ->get();

    $title = Brand::findOrFail($id)->brand_name;

    return view('frontend.products', compact(
        'products',
        'categories',
        'brands',
        'title'
    ));
}
}
