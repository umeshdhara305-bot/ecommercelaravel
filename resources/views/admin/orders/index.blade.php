@include('admin.includes.header')
@include('admin.includes.sidebar')

<div class="main-content">

    <section class="section">

        <div class="section-header">
            <h1>All Orders</h1>
        </div>

        <div class="section-body">

            <div class="card">
                <div class="card-header">
                    <h4>Order List</h4>
                </div>

                <div class="card-body">

                    <div class="table-responsive">

                        <table class="table table-bordered table-striped">

                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Customer</th>
                                    <th>Amount</th>
                                    <th>Payment</th>
                                    <th>Order Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>

                                @forelse($orders as $order)

                                    <tr>

                                        {{-- Order ID --}}
                                        <td>
                                            <strong>#{{ $order->id }}</strong>
                                        </td>


                                        {{-- Customer --}}
                                        <td>
                                            <strong>
                                                {{ $order->user->name ?? 'Guest' }}
                                            </strong>

                                            <br>

                                            <small class="text-muted">
                                                {{ $order->user->email ?? '' }}
                                            </small>
                                        </td>


                                        {{-- Amount --}}
                                        <td>
                                            <strong>
                                                ₹{{ number_format($order->total_amount, 2) }}
                                            </strong>
                                        </td>


                                        {{-- Payment Status --}}
                                        <td>

                                            @if($order->payment_status == 'paid')

                                                <span class="badge badge-success">
                                                    Paid
                                                </span>

                                            @elseif($order->payment_status == 'failed')

                                                <span class="badge badge-danger">
                                                    Failed
                                                </span>

                                            @elseif($order->payment_status == 'refunded')

                                                <span class="badge badge-secondary">
                                                    Refunded
                                                </span>

                                            @else

                                                <span class="badge badge-warning">
                                                    Pending
                                                </span>

                                            @endif

                                        </td>


                                        {{-- Order Status --}}
                                        <td>

                                            @if($order->order_status == 'pending')

                                                <span class="badge badge-warning">
                                                    Pending
                                                </span>

                                            @elseif($order->order_status == 'processing')

                                                <span class="badge badge-info">
                                                    Processing
                                                </span>

                                            @elseif($order->order_status == 'shipped')

                                                <span class="badge badge-primary">
                                                    Shipped
                                                </span>

                                            @elseif($order->order_status == 'delivered')

                                                <span class="badge badge-success">
                                                    Delivered
                                                </span>

                                            @elseif($order->order_status == 'cancelled')

                                                <span class="badge badge-danger">
                                                    Cancelled
                                                </span>

                                            @else

                                                <span class="badge badge-secondary">
                                                    {{ ucfirst($order->order_status) }}
                                                </span>

                                            @endif

                                        </td>


                                        {{-- Action --}}
                                        <td>

                                            <a href="{{ route('admin.orders.show', $order->id) }}"
                                               class="btn btn-primary btn-sm">

                                                <i class="fas fa-eye"></i>
                                                View

                                            </a>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>
                                        <td colspan="6" class="text-center">
                                            No orders found.
                                        </td>
                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>
            </div>

        </div>

    </section>

</div>

@include('admin.includes.footer')