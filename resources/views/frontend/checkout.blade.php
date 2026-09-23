@extends('frontend.layout')

@section('content')

	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->

			<div class="step-one">
				<h2 class="heading">Step1</h2>
			</div>
			<div class="checkout-options">
				<h3>New User</h3>
				<p>Checkout options</p>
				<ul class="nav">
					<li>
						<label><input type="checkbox"> Register Account</label>
					</li>
					<li>
						<label><input type="checkbox"> Guest Checkout</label>
					</li>
					<li>
						<a href=""><i class="fa fa-times"></i>Cancel</a>
					</li>
				</ul>
			</div><!--/checkout-options-->

			<div class="register-req">
				<p>Please use Register And Checkout to easily get access to your order history, or use Checkout as Guest</p>
			</div><!--/register-req-->

<form action="{{ route('order.place') }}" method="POST">
    @csrf

    <div class="shopper-informations">
        <div class="row">

            {{-- Shipping Address --}}
            <div class="col-sm-6">
                <div class="shopper-info">

                    <p>Shipping Information</p>

                    <div class="form-group">
                        <label>Shipping Address *</label>

                        <textarea
                            name="shipping_address"
                            class="form-control"
                            rows="6"
                            placeholder="Enter your complete shipping address"
                            required
                        >{{ old('shipping_address') }}</textarea>

                        @error('shipping_address')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Phone Number *</label>

                        <input
                            type="text"
                            name="phone"
                            class="form-control"
                            value="{{ old('phone') }}"
                            placeholder="Enter your phone number"
                            required
                        >

                        @error('phone')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>

                </div>
            </div>


            {{-- Order Notes --}}
            <div class="col-sm-6">
                <div class="order-message">

                    <p>Order Notes</p>

                    <textarea
                        name="notes"
                        class="form-control"
                        placeholder="Notes about your order or delivery instructions"
                        rows="10"
                    >{{ old('notes') }}</textarea>

                </div>
            </div>

        </div>
    </div>
		<div class="review-payment">
    <h2>Review & Payment</h2>
</div>

<div class="table-responsive cart_info">

    <table class="table table-condensed">

        <thead>
            <tr class="cart_menu">
                <td>Item</td>
                <td>Description</td>
                <td>Price</td>
                <td>Quantity</td>
                <td>Total</td>
            </tr>
        </thead>

        <tbody>

            @php
                $totalAmount = 0;
            @endphp

            @foreach($cart as $item)

                @php
                    $subtotal = $item['price'] * $item['quantity'];
                    $totalAmount += $subtotal;
                @endphp

                <tr>

                    <td class="cart_product">
                        <img
                            src="{{ asset('uploads/products/' . $item['image']) }}"
                            width="80"
                            alt="{{ $item['product_name'] }}"
                        >
                    </td>

                    <td class="cart_description">
                        <h4>{{ $item['product_name'] }}</h4>
                    </td>

                    <td class="cart_price">
                        ₹{{ number_format($item['price'], 2) }}
                    </td>

                    <td class="cart_quantity">
                        {{ $item['quantity'] }}
                    </td>

                    <td class="cart_total">
                        ₹{{ number_format($subtotal, 2) }}
                    </td>

                </tr>

            @endforeach

        </tbody>

    </table>

</div>
<div class="payment-options">

    <h4>Select Payment Method</h4>

    <div class="form-group">

        <label>
            <input
                type="radio"
                name="payment_method"
                value="cod"
                required
                {{ old('payment_method') == 'cod' ? 'checked' : '' }}
            >

            Cash on Delivery
        </label>

        <br>

        <label>
            <input
                type="radio"
                name="payment_method"
                value="bank_transfer"
                {{ old('payment_method') == 'bank_transfer' ? 'checked' : '' }}
            >

            Direct Bank Transfer
        </label>

    </div>

    @error('payment_method')
        <small class="text-danger">
            {{ $message }}
        </small>
    @enderror

</div>
<div class="total_area">

    <ul>

        <li>
            Cart Sub Total
            <span>
                ₹{{ number_format($totalAmount, 2) }}
            </span>
        </li>

        <li>
            Shipping Cost
            <span>Free</span>
        </li>

        <li>
            <strong>Total</strong>

            <span>
                <strong>
                    ₹{{ number_format($totalAmount, 2) }}
                </strong>
            </span>
        </li>

    </ul>

    <button
        type="submit"
        class="btn btn-default check_out"
    >
        Place Order
    </button>

</div>

</form>
		</div>
	</section> <!--/#cart_items-->
		@endsection

