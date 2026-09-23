<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Order;

class DashboardController extends Controller
{
    public function index()
    {
        $customerCount = User::count();
        $productCount = Product::count();
        $categoryCount = Category::count();
        $brandCount = Brand::count();

        // Total Orders
        $orderCount = Order::count();

        // Total Revenue
        $totalRevenue = Order::where('payment_status', 'paid')
            ->sum('total_amount');

        return view('admin.dashboard.index', compact(
            'customerCount',
            'productCount',
            'categoryCount',
            'brandCount',
            'orderCount',
            'totalRevenue'
        ));
    }
}