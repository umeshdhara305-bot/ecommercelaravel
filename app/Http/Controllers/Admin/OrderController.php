<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // All Orders
    public function index()
    {
        $orders = Order::with('user')
            ->latest()
            ->get();

        return view('admin.orders.index', compact('orders'));
    }

    // Order Details
    public function show($id)
    {
        $order = Order::with(['user', 'items'])
            ->findOrFail($id);

        return view('admin.orders.show', compact('order'));
    }

    // Update Order Status
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'order_status' => 'required|in:pending,processing,shipped,delivered,cancelled',
        ]);

        $order = Order::findOrFail($id);

        $order->order_status = $request->order_status;

        $order->save();

        return redirect()
            ->route('admin.orders.show', $order->id)
            ->with('success', 'Order status updated successfully.');
    }
    // Update Payment Status
public function updatePaymentStatus(Request $request, $id)
{
    $request->validate([
        'payment_status' => 'required|in:pending,paid,failed,refunded',
    ]);

    $order = Order::findOrFail($id);

    $order->payment_status = $request->payment_status;

    $order->save();

    return redirect()
        ->route('admin.orders.show', $order->id)
        ->with('success', 'Payment status updated successfully.');
}

}