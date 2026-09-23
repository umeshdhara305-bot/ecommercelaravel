@extends('frontend.layout')

@section('content')

<section id="cart_items">
    <div class="container">

        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('index') }}">Home</a>
                </li>
                <li class="active">Order Confirmation</li>
            </ol>
        </div>

        <div class="text-center" style="margin: 40px 0;">

            <h1>Thank You!</h1>

            <h3>Your order has been placed successfully.</h3>

            <p>
                Order ID:
                <strong>#{{ $order->id }}</strong>
            </p>

        </div>


        {{-- Customer Information --}}
        <div class="shopper-informations">

            <div class="row">

                <div class="col-sm-6">

                    <div class="shopper-info">

                        <h3>Customer Information</h3>

                        <p>
                            <strong>Name:</strong>
                            {{ $order->user->name }}
                        </p>

                        <p>
                            <strong>Email:</strong>
                            {{ $order->user->email }}
                        </p>

                        <p>
                            <strong>Phone:</strong>
                            {{ $order->phone }}
                        </p>

                    </div>

                </div>


                <div class="col-sm-6">

                    <div class="shopper-info">

                        <h3>Shipping Information</h3>

                        <p>
                            <strong>Address:</strong>
                        </p>

                        <p>
                            {{ $order->shipping_address }}
                        </p>

                    </div>

                </div>

            </div>

        </div>


        {{-- Order Details --}}
        <div class="review-payment">

            <h2>Order Details</h2>

        </div>


        <div class="table-responsive cart_info">

            <table class="table table-condensed">

                <thead>

                    <tr class="cart_menu">

                        <td>Product</td>
                        <td>Price</td>
                        <td>Quantity</td>
                        <td>Subtotal</td>

                    </tr>

                </thead>


                <tbody>

                    @foreach($order->items as $item)

                        <tr>

                            <td class="cart_description">

                                <h4>
                                    {{ $item->product_name }}
                                </h4>

                            </td>


                            <td class="cart_price">

                                ₹{{ number_format($item->price, 2) }}

                            </td>


                            <td class="cart_quantity">

                                {{ $item->quantity }}

                            </td>


                            <td class="cart_total">

                                ₹{{ number_format($item->subtotal, 2) }}

                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>


        {{-- Order Summary --}}
        <div class="total_area">

            <ul>

                <li>
                    Payment Method

                    <span>
                        @if($order->payment_method == 'cod')
                            Cash on Delivery
                        @elseif($order->payment_method == 'bank_transfer')
                            Direct Bank Transfer
                        @else
                            {{ ucfirst($order->payment_method) }}
                        @endif
                    </span>
                </li>


                <li>
                    Payment Status

                    <span>
                        {{ ucfirst($order->payment_status) }}
                    </span>
                </li>


                <li>
                    Order Status

                    <span>
                        {{ ucfirst($order->order_status) }}
                    </span>
                </li>


                <li>
                    Total

                    <span>
                        <strong>
                            ₹{{ number_format($order->total_amount, 2) }}
                        </strong>
                    </span>
                </li>

            </ul>

        </div>


        {{-- Buttons --}}
        <div class="text-center" style="margin: 30px 0;">

            <a href="{{ route('shop') }}"
               class="btn btn-default">
                Continue Shopping
            </a>

            <a href="{{ route('orders.show', $order->id) }}"
               class="btn btn-primary">
                View Order
            </a>

        </div>

    </div>
</section>

@endsection