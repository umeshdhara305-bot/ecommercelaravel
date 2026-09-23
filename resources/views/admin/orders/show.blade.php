@include('admin.includes.header')
@include('admin.includes.sidebar')

<div class="main-content">

    <section class="section">

        <div class="section-header">
            <h1>Order Details #{{ $order->id }}</h1>

            <div class="section-header-button">
                <a href="{{ route('admin.orders.index') }}"
                   class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i>
                    Back to Orders
                </a>
            </div>
        </div>


        <div class="section-body">
            @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

            <div class="row">

                {{-- Customer Information --}}
                <div class="col-md-6">

                    <div class="card">
                        <div class="card-header">
                            <h4>Customer Information</h4>
                        </div>

                        <div class="card-body">

                            <p>
                                <strong>Name:</strong>
                                {{ $order->user->name ?? 'N/A' }}
                            </p>

                            <p>
                                <strong>Email:</strong>
                                {{ $order->user->email ?? 'N/A' }}
                            </p>

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


                {{-- Order Information --}}
                <div class="col-md-6">

                    <div class="card">
                        <div class="card-header">
                            <h4>Order Information</h4>
                        </div>

                        <div class="card-body">

                            <p>
                                <strong>Order ID:</strong>
                                #{{ $order->id }}
                            </p>

                            <p>
                                <strong>Order Date:</strong>
                                {{ $order->created_at->format('d M Y, h:i A') }}
                            </p>

                            <p>
                                <strong>Total Amount:</strong>
                                ₹{{ number_format($order->total_amount, 2) }}
                            </p>

                            <p>
                                <strong>Payment Method:</strong>
                                {{ ucfirst(str_replace('_', ' ', $order->payment_method)) }}
                            </p>

                          <div class="mt-4">

    <p>
        <strong>Current Payment Status:</strong>

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
    </p>


    <form action="{{ route('admin.orders.updatePaymentStatus', $order->id) }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="form-group">

            <label>
                <strong>Change Payment Status</strong>
            </label>

            <select name="payment_status" class="form-control">

                <option value="pending"
                    {{ $order->payment_status == 'pending' ? 'selected' : '' }}>
                    Pending
                </option>

                <option value="paid"
                    {{ $order->payment_status == 'paid' ? 'selected' : '' }}>
                    Paid
                </option>

                <option value="failed"
                    {{ $order->payment_status == 'failed' ? 'selected' : '' }}>
                    Failed
                </option>

                <option value="refunded"
                    {{ $order->payment_status == 'refunded' ? 'selected' : '' }}>
                    Refunded
                </option>

            </select>

        </div>

        <button type="submit" class="btn btn-success">
            <i class="fas fa-money-bill"></i>
            Update Payment
        </button>

    </form>

</div>

                           <div class="mt-4">

    <p>
        <strong>Current Order Status:</strong>

        <span class="badge badge-info">
            {{ ucfirst($order->order_status) }}
        </span>
    </p>

    <form action="{{ route('admin.orders.updateStatus', $order->id) }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="form-group">

            <label>
                <strong>Change Order Status</strong>
            </label>

            <select name="order_status" class="form-control">

                <option value="pending"
                    {{ $order->order_status == 'pending' ? 'selected' : '' }}>
                    Pending
                </option>

                <option value="processing"
                    {{ $order->order_status == 'processing' ? 'selected' : '' }}>
                    Processing
                </option>

                <option value="shipped"
                    {{ $order->order_status == 'shipped' ? 'selected' : '' }}>
                    Shipped
                </option>

                <option value="delivered"
                    {{ $order->order_status == 'delivered' ? 'selected' : '' }}>
                    Delivered
                </option>

                <option value="cancelled"
                    {{ $order->order_status == 'cancelled' ? 'selected' : '' }}>
                    Cancelled
                </option>

            </select>

        </div>

        <button type="submit" class="btn btn-primary">
            <i class="fas fa-save"></i>
            Update Status
        </button>

    </form>

</div>
                        </div>
                    </div>

                </div>

            </div>


            {{-- Ordered Products --}}
            <div class="card">

                <div class="card-header">
                    <h4>Ordered Products</h4>
                </div>

                <div class="card-body">

                    <div class="table-responsive">

                        <table class="table table-bordered table-striped">

                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>

                            <tbody>

                                @forelse($order->items as $item)

                                    <tr>

                                        <td>
                                            {{ $loop->iteration }}
                                        </td>

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

                                @empty

                                    <tr>
                                        <td colspan="5" class="text-center">
                                            No products found.
                                        </td>
                                    </tr>

                                @endforelse

                            </tbody>

                            <tfoot>
                                <tr>
                                    <td colspan="4" class="text-right">
                                        <strong>Grand Total:</strong>
                                    </td>

                                    <td>
                                        <strong>
                                            ₹{{ number_format($order->total_amount, 2) }}
                                        </strong>
                                    </td>
                                </tr>
                            </tfoot>

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </section>

</div>

@include('admin.includes.footer')