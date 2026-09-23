@extends('frontend.layout')

@section('content')

<section id="cart_items">
    <div class="container">

        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('index') }}">Home</a>
                </li>
                <li class="active">My Orders</li>
            </ol>
        </div>

        <h2>My Orders</h2>

        <div class="table-responsive cart_info">

            <table class="table table-condensed">

                <thead>
                    <tr class="cart_menu">
                        <td>Order ID</td>
                        <td>Order Date</td>
                        <td>Total Amount</td>
                        <td>Payment Status</td>
                        <td>Order Status</td>
                        <td>Action</td>
                    </tr>
                </thead>

                <tbody>

                    @forelse($orders as $order)

                        <tr>

                            <td>
                                #{{ $order->id }}
                            </td>

                            <td>
                                {{ $order->created_at->format('d M Y') }}
                            </td>

                            <td>
                                ₹{{ number_format($order->total_amount, 2) }}
                            </td>

                            {{-- Payment Status --}}
                            <td>
                                @if($order->payment_status == 'paid')
                                    <span class="label label-success">
                                        Paid
                                    </span>

                                @elseif($order->payment_status == 'failed')
                                    <span class="label label-danger">
                                        Failed
                                    </span>

                                @elseif($order->payment_status == 'refunded')
                                    <span class="label label-default">
                                        Refunded
                                    </span>

                                @else
                                    <span class="label label-warning">
                                        Pending
                                    </span>
                                @endif
                            </td>

                            {{-- Order Status --}}
                            <td>
                                @if($order->order_status == 'pending')
                                    <span class="label label-warning">
                                        Pending
                                    </span>

                                @elseif($order->order_status == 'processing')
                                    <span class="label label-info">
                                        Processing
                                    </span>

                                @elseif($order->order_status == 'shipped')
                                    <span class="label label-primary">
                                        Shipped
                                    </span>

                                @elseif($order->order_status == 'delivered')
                                    <span class="label label-success">
                                        Delivered
                                    </span>

                                @elseif($order->order_status == 'cancelled')
                                    <span class="label label-danger">
                                        Cancelled
                                    </span>
                                @endif
                            </td>

                            <td>
                              <a href="{{ route('orders.show', $order->id) }}"
   class="btn btn-default btn-sm">
    <i class="fa fa-eye"></i>
    View
</a>
                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="6" class="text-center">
                                <h4>You have not placed any orders yet.</h4>

                                <a href="{{ route('index') }}"
                                   class="btn btn-primary">
                                    Start Shopping
                                </a>
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>
</section>

@endsection