<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    // Show checkout page
    public function checkout()
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()
                ->route('cart.index')
                ->with('error', 'Your cart is empty.');
        }

        return view('frontend.checkout', compact('cart'));
    }


    // Place order
    public function placeOrder(Request $request)
    {
        // Validate checkout form
        $request->validate([
            'shipping_address' => 'required',
            'phone' => 'required|string|max:20',
            'payment_method' => 'required',
            'notes' => 'nullable',
        ]);

        // Get cart
        $cart = session()->get('cart', []);

        // Prevent empty order
        if (empty($cart)) {
            return redirect()
                ->route('cart.index')
                ->with('error', 'Your cart is empty.');
        }


        // Create order and order items
        $order = DB::transaction(function () use ($request, $cart) {

            // Calculate total
            $totalAmount = 0;

            foreach ($cart as $item) {
                $totalAmount += $item['price'] * $item['quantity'];
            }


            // Create order
            $order = Order::create([
                'user_id' => Auth::id(),
                'total_amount' => $totalAmount,
                'payment_method' => $request->payment_method,
                'payment_status' => 'pending',
                'order_status' => 'pending',
                'shipping_address' => $request->shipping_address,
                'phone' => $request->phone,
                'notes' => $request->notes,
            ]);


            // Create order items
            foreach ($cart as $item) {

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['id'],
                    'product_name' => $item['product_name'],
                    'price' => $item['price'],
                    'quantity' => $item['quantity'],
                    'subtotal' => $item['price'] * $item['quantity'],
                ]);
            }


            // Return created order
            return $order;
        });


        // Clear cart
        session()->forget('cart');


        // Redirect to Thank You page
        return redirect()
            ->route('order.thankyou', $order->id);
    }


    // Thank You page
    public function thankYou($id)
    {
        $order = Order::with('items')
            ->where('user_id', Auth::id())
            ->findOrFail($id);

        return view('frontend.thank-you', compact('order'));
    }


    // Customer My Orders
    public function myOrders()
    {
        $orders = Order::where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('frontend.my-orders', compact('orders'));
    }


    // Customer Order Details
    public function showMyOrder($id)
    {
        $order = Order::with('items')
            ->where('user_id', Auth::id())
            ->findOrFail($id);

        return view('frontend.order-details', compact('order'));
    }
}