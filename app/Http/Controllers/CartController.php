<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    // Show Cart
    public function index()
    {
        $cart = session()->get('cart', []);

        return view('frontend.cart', compact('cart'));
    }

    // Add Product
    public function add($id)
    {
        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {

            $cart[$id]['quantity']++;

        } else {

            $cart[$id] = [
                'id' => $product->id,
                'product_name' => $product->product_name,
                'price' => $product->price,
                'image' => $product->image,
                'quantity' => 1
            ];
        }

        session()->put('cart', $cart);

           return redirect()->route('cart.index')
        ->with('success', 'Product Added To Cart');
}

    // Increase Quantity
    public function increase($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.index');
    }

    // Decrease Quantity
    public function decrease($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {

            if ($cart[$id]['quantity'] > 1) {
                $cart[$id]['quantity']--;
            }

        }

        session()->put('cart', $cart);

        return redirect()->route('cart.index');
    }

    // Remove Product
    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.index')
            ->with('success', 'Product Removed From Cart');
    }
}