@extends('frontend.layout')

@section('content')
<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">
									<h1><span>E</span>-SHOPPER</h1>
									<h2>Free E-Commerce Template</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
								<img src="{{ asset('assets/frontend/images/home/girl1.jpg') }}" class="girl img-responsive" alt="" />

<img src="{{ asset('assets/frontend/images/home/pricing.png') }}" class="pricing" alt="" />
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<h1><span>E</span>-SHOPPER</h1>
									<h2>100% Responsive Design</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="{{ asset('assets/frontend/images/home/girl2.jpg') }}" class="girl img-responsive" alt="" />

<img src="{{ asset('assets/frontend/images/home/pricing.png') }}" class="pricing" alt="" />
								</div>
							</div>
							
							<div class="item">
								<div class="col-sm-6">
									<h1><span>E</span>-SHOPPER</h1>
									<h2>Free Ecommerce Template</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="{{ asset('assets/frontend/images/home/girl3.jpg') }}" class="girl img-responsive" alt="" />

<img src="{{ asset('assets/frontend/images/home/pricing.png') }}" class="pricing" alt="" />
								</div>
							</div>
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
	
	<section>
		<div class="container">
			@include('frontend.sidebar')
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
    <h2 class="title text-center">Features Items</h2>

    @forelse($featuredProducts as $product)

    <div class="col-sm-4">
        <div class="product-image-wrapper">

            <div class="single-products">

                <div class="productinfo text-center">

                    <img src="{{ asset('uploads/products/'.$product->image) }}" alt="{{ $product->product_name }}" style="height:250px;width:100%;object-fit:contain;">

                    <h2>₹{{ $product->price }}</h2>

                    <p>{{ $product->product_name }}</p>

                <a href="{{ route('cart.add', $product->id) }}" class="btn btn-default add-to-cart">
    <i class="fa fa-shopping-cart"></i> Add to cart
</a>

                </div>

                <div class="product-overlay">
                    <div class="overlay-content">

                        <h2>₹{{ $product->price }}</h2>

                        <p>{{ $product->product_name }}</p>

                       <a href="{{ route('cart.add', $product->id) }}" class="btn btn-default add-to-cart">
    <i class="fa fa-shopping-cart"></i> Add to cart
</a>

                    </div>
                </div>

            </div>

            <div class="choose">
                <ul class="nav nav-pills nav-justified">
                    <li>
                        <a href="#">
                            <i class="fa fa-plus-square"></i> Add to wishlist
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <i class="fa fa-plus-square"></i> Add to compare
                        </a>
                    </li>
                </ul>
            </div>

        </div>
    </div>

    @empty

    <div class="col-sm-12">
        <h4 class="text-center">No Featured Products Found</h4>
    </div>

    @endforelse

</div><!--features_items-->
				<div class="category-tab"><!--category-tab-->

    <div class="col-sm-12">

        <ul class="nav nav-tabs">

            @foreach($categories as $key => $category)

                <li class="{{ $key == 0 ? 'active' : '' }}">

                    <a
                        href="#category{{ $category->id }}"
                        data-toggle="tab"
                    >
                        {{ $category->cat_name }}
                    </a>

                </li>

            @endforeach

        </ul>

    </div>


    <div class="tab-content">

        @foreach($categories as $key => $category)

            <div
                class="tab-pane fade {{ $key == 0 ? 'active in' : '' }}"
                id="category{{ $category->id }}"
            >

                @forelse($category->products->take(4) as $product)

                    <div class="col-sm-3">

                        <div class="product-image-wrapper">

                            <div class="single-products">

                                <div class="productinfo text-center">

                                    {{-- Product Image --}}
                                    @if($product->image)

                                        <img
                                            src="{{ asset('uploads/products/' . $product->image) }}"
                                            alt="{{ $product->product_name }}"
                                        >

                                    @else

                                        <img
                                            src="{{ asset('assets/frontend/images/home/gallery1.jpg') }}"
                                            alt="{{ $product->product_name }}"
                                        >

                                    @endif


                                    {{-- Price --}}
                                    <h2>
                                        ₹{{ number_format($product->price, 2) }}
                                    </h2>


                                    {{-- Product Name --}}
                                    <p>
                                        {{ $product->product_name }}
                                    </p>


                                    {{-- Add To Cart --}}
                                    <a
                                        href="{{ route('cart.add', $product->id) }}"
                                        class="btn btn-default add-to-cart"
                                    >
                                        <i class="fa fa-shopping-cart"></i>
                                        Add to cart
                                    </a>

                                </div>


                                {{-- Hover Overlay --}}
                                <div class="product-overlay">

                                    <div class="overlay-content">

                                        <h2>
                                            ₹{{ number_format($product->price, 2) }}
                                        </h2>

                                        <p>
                                            {{ $product->product_name }}
                                        </p>

                                        <a
                                            href="{{ route('cart.add', $product->id) }}"
                                            class="btn btn-default add-to-cart"
                                        >
                                            <i class="fa fa-shopping-cart"></i>
                                            Add to cart
                                        </a>

                                    </div>

                                </div>

                            </div>


                            {{-- View Product --}}
                            <div class="choose">

                                <ul class="nav nav-pills nav-justified">

                                    <li>
                                        <a
                                            href="{{ route('product.details', $product->id) }}"
                                        >
                                            <i class="fa fa-eye"></i>
                                            View Product
                                        </a>
                                    </li>

                                </ul>

                            </div>

                        </div>

                    </div>

                @empty

                    <div class="col-sm-12">

                        <p class="text-center">
                            No products available in
                            {{ $category->cat_name }}.
                        </p>

                    </div>

                @endforelse

            </div>

        @endforeach

    </div>

</div><!--/category-tab-->
					
				<div class="recommended_items"><!--recommended_items-->
    <h2 class="title text-center">Recommended Items</h2>

    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">

            <div class="item active">

                @forelse($recommendedProducts as $product)

                <div class="col-sm-4">
                    <div class="product-image-wrapper">

                        <div class="single-products">

                            <div class="productinfo text-center">

                                <img src="{{ asset('uploads/products/'.$product->image) }}"
                                     alt="{{ $product->product_name }}"
                                     style="height:250px;width:100%;object-fit:contain;">

                                <h2>₹{{ $product->price }}</h2>

                                <p>{{ $product->product_name }}</p>

                               <a href="{{ route('cart.add', $product->id) }}" class="btn btn-default add-to-cart">
    <i class="fa fa-shopping-cart"></i> Add to cart
</a>

                            </div>

                        </div>

                    </div>
                </div>

                @empty

                <div class="col-sm-12 text-center">
                    <h4>No Recommended Products Found</h4>
                </div>

                @endforelse

            </div>

        </div>

        <a class="left recommended-item-control"
           href="#recommended-item-carousel"
           data-slide="prev">
            <i class="fa fa-angle-left"></i>
        </a>

        <a class="right recommended-item-control"
           href="#recommended-item-carousel"
           data-slide="next">
            <i class="fa fa-angle-right"></i>
        </a>

    </div>
</div><!--/recommended_items-->
				</div>
			</div>
		</div>
	</section>
	@endsection