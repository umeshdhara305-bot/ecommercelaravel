@extends('frontend.layout')

@section('content')
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
				<tbody>

    @php
        $subtotal = 0;
    @endphp

    @forelse($cart as $id => $item)

        @php
            $itemTotal = $item['price'] * $item['quantity'];
            $subtotal += $itemTotal;
        @endphp

        <tr>

            {{-- Product Image --}}
            <td class="cart_product">
                <img
                    src="{{ asset('uploads/products/' . $item['image']) }}"
                    alt="{{ $item['product_name'] }}"
                    width="100"
                >
            </td>


            {{-- Product Name --}}
            <td class="cart_description">
                <h4>
                    {{ $item['product_name'] }}
                </h4>

                <p>
                    Product ID: {{ $item['id'] }}
                </p>
            </td>


            {{-- Price --}}
            <td class="cart_price">
                <p>₹{{ number_format($item['price'], 2) }}</p>
            </td>


            {{-- Quantity --}}
            <td class="cart_quantity">

                <div class="cart_quantity_button">

                    {{-- Increase --}}
                    <a
                        class="cart_quantity_up"
                        href="{{ route('cart.increase', $id) }}"
                    >
                        +
                    </a>


                    <input
                        class="cart_quantity_input"
                        type="text"
                        value="{{ $item['quantity'] }}"
                        readonly
                        size="2"
                    >


                    {{-- Decrease --}}
                    <a
                        class="cart_quantity_down"
                        href="{{ route('cart.decrease', $id) }}"
                    >
                        -
                    </a>

                </div>

            </td>


            {{-- Item Total --}}
            <td class="cart_total">
                <p class="cart_total_price">
                    ₹{{ number_format($itemTotal, 2) }}
                </p>
            </td>


            {{-- Remove --}}
            <td class="cart_delete">

                <a
                    class="cart_quantity_delete"
                    href="{{ route('cart.remove', $id) }}"
                >
                    <i class="fa fa-times"></i>
                </a>

            </td>

        </tr>

    @empty

        <tr>
            <td colspan="6" class="text-center">
                <h4>Your cart is empty</h4>

                <a href="{{ route('index') }}" class="btn btn-primary">
                    Continue Shopping
                </a>
            </td>
        </tr>

    @endforelse

</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="chose_area">
						<ul class="user_option">
							<li>
								<input type="checkbox">
								<label>Use Coupon Code</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Use Gift Voucher</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Estimate Shipping & Taxes</label>
							</li>
						</ul>
						<ul class="user_info">
							<li class="single_field">
								<label>Country:</label>
								<select>
									<option>United States</option>
									<option>Bangladesh</option>
									<option>UK</option>
									<option>India</option>
									<option>Pakistan</option>
									<option>Ucrane</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
								
							</li>
							<li class="single_field">
								<label>Region / State:</label>
								<select>
									<option>Select</option>
									<option>Dhaka</option>
									<option>London</option>
									<option>Dillih</option>
									<option>Lahore</option>
									<option>Alaska</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
							
							</li>
							<li class="single_field zip-field">
								<label>Zip Code:</label>
								<input type="text">
							</li>
						</ul>
						<a class="btn btn-default update" href="">Get Quotes</a>
						<a class="btn btn-default check_out" href="">Continue</a>
					</div>
				</div>
				<div class="col-sm-6">
				<div class="total_area">
    <ul>

        <li>
            Cart Sub Total
            <span>₹{{ number_format($subtotal, 2) }}</span>
        </li>

        <li>
            Shipping Cost
            <span>Free</span>
        </li>

        <li>
            Total
            <span>₹{{ number_format($subtotal, 2) }}</span>
        </li>

    </ul>

    <a
        class="btn btn-default update"
 href="{{ route('index') }}" class="btn btn-primary">
    Continue Shopping
</a>
  
 @if(count($cart) > 0)
    <a href="{{ route('checkout.index') }}"
       class="btn btn-default check_out">
        Check Out
    </a>
@endif

</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->

	@endsection