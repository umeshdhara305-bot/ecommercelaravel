@extends('frontend.layout')

@section('content')

<section id="cart_items">

    <div class="container">

        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('index') }}">Home</a>
                </li>

                <li>
                    <a href="{{ route('orders.index') }}">My Orders</a>
                </li>

                <li class="active">
                    Order #{{ $order->id }}
                </li>
            </ol>
        </div>


        <div class="row">

            {{-- Order Information --}}
            <div class="col-sm-6">

                <div class="shopper-info">

                    <h3>Order Information</h3>

                    <p>
                        <strong>Order ID:</strong>
                        #{{ $order->id }}
                    </p>

                    <p>
                        <strong>Order Date:</strong>
                        {{ $order->created_at->format('d M Y, h:i A') }}
                    </p>

                    <p>
                        <strong>Payment Method:</strong>
                        {{ ucfirst(str_replace('_', ' ', $order->payment_method)) }}
                    </p>

                    <p>
                        <strong>Payment Status:</strong>
                        {{ ucfirst($order->payment_status) }}
                    </p>

                    <p>
                        <strong>Order Status:</strong>
                        {{ ucfirst($order->order_status) }}
                    </p>

                    <p>
                        <strong>Total Amount:</strong>
                        ₹{{ number_format($order->total_amount, 2) }}
                    </p>

                </div>

            </div>


            {{-- Shipping Information --}}
            <div class="col-sm-6">

                <div class="shopper-info">

                    <h3>Shipping Information</h3>

                    <p>
                        <strong>Phone:</strong>
                        {{ $order->phone }}
                    </p>

                    <p>
                        <strong>Shipping Address:</strong>
                        <br>
                        {{ $order->shipping_address }}
                    </p>

                    @if($order->notes)

                        <p>
                            <strong>Order Notes:</strong>
                            <br>
                            {{ $order->notes }}
                        </p>

                    @endif

                </div>

            </div>

        </div>


        <div class="review-payment">
            <h2>Ordered Products</h2>
        </div>


        <div class="table-responsive cart_info">

            <table class="table table-condensed">

                <thead>

                    <tr class="cart_menu">
                        <td>Product</td>
                        <td>Price</td>
                        <td>Quantity</td>
                        <td>Total</td>
                    </tr>

                </thead>

                <tbody>

                    @foreach($order->items as $item)

                        <tr>

                            <td>
                                {{ $item->product_name }}
                            </td>

                            <td>
                                ₹{{ number_format($item->price, 2) }}
                            </td>

                            <td>
                                {{ $item->quantity }}
                            </td>

                            <td>
                                ₹{{ number_format($item->subtotal, 2) }}
                            </td>

                        </tr>

                    @endforeach


                    <tr>

                        <td colspan="3" class="text-right">
                            <strong>Grand Total:</strong>
                        </td>

                        <td>
                            <strong>
                                ₹{{ number_format($order->total_amount, 2) }}
                            </strong>
                        </td>

                    </tr>

                </tbody>

            </table>

        </div>


        <a href="{{ route('orders.index') }}"
           class="btn btn-default">
            <i class="fa fa-arrow-left"></i>
            Back to My Orders
        </a>

    </div>

</section>

@endsection