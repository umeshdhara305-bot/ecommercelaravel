
@extends('frontend.layout')

@section('content')

<!-- Advertisement -->
<section id="advertisement">
    <div class="container">
        <img
            src="{{ asset('assets/frontend/images/shop/advertisement.jpg') }}"
            alt="Advertisement"
        />
    </div>
</section>
<!-- /Advertisement -->


<section>
    <div class="container">

        <div class="row">

            <!-- LEFT SIDEBAR -->
            <div class="col-sm-3">

                <div class="left-sidebar">

                    <!-- CATEGORIES -->
                    <h2>Category</h2>

                    <div class="panel-group category-products" id="accordian">

                        @foreach($categories as $category)

                            <div class="panel panel-default">

                                <div class="panel-heading">

                                    <h4 class="panel-title">

                                        <a href="{{ route('category.products', $category->id) }}">

                                            {{ $category->cat_name }}

                                            <span class="pull-right">
                                                ({{ $category->products->count() }})
                                            </span>

                                        </a>

                                    </h4>

                                </div>

                            </div>

                        @endforeach

                    </div>
                    <!-- /category-products -->


                    <!-- BRANDS -->
                    <div class="brands_products">

                        <h2>Brands</h2>

                        <div class="brands-name">

                            <ul class="nav nav-pills nav-stacked">

                                @foreach($brands as $brand)

                                    <li>

                                        <a href="{{ route('brand.products', $brand->id) }}">

                                            {{ $brand->brand_name }}

                                            <span class="pull-right">
                                                ({{ $brand->products->count() }})
                                            </span>

                                        </a>

                                    </li>

                                @endforeach

                            </ul>

                        </div>

                    </div>
                    <!-- /brands_products -->


                    <!-- PRICE RANGE -->
                    <div class="price-range">

                        <h2>Price Range</h2>

                        <div class="well">

                            <input
                                type="text"
                                class="span2"
                                value=""
                                data-slider-min="0"
                                data-slider-max="5000"
                                data-slider-step="100"
                                data-slider-value="[500,3000]"
                                id="sl2"
                            >

                            <br>

                            <b>₹ 0</b>

                            <b class="pull-right">₹ 5000</b>

                        </div>

                    </div>
                    <!-- /price-range -->


                    <!-- SHIPPING -->
                    <div class="shipping text-center">

                        <img
                            src="{{ asset('assets/frontend/images/home/shipping.jpg') }}"
                            alt="Shipping"
                        />

                    </div>
                    <!-- /shipping -->

                </div>

            </div>
            <!-- /LEFT SIDEBAR -->


            <!-- PRODUCTS -->
            <div class="col-sm-9 padding-right">

                <div class="features_items">

                    <h2 class="title text-center">
                        All Products
                    </h2>


                    <!-- PRODUCT COUNT -->
                    <div class="text-right" style="margin-bottom: 20px;">

                        <strong>
                            Total Products:
                            {{ $products->total() }}
                        </strong>

                    </div>


                    @forelse($products as $product)

                        <div class="col-sm-4">

                            <div class="product-image-wrapper">

                                <div class="single-products">

                                    <!-- PRODUCT INFO -->
                                    <div class="productinfo text-center">

                                        <!-- PRODUCT IMAGE -->

                                        <a href="{{ route('product.details', $product->id) }}">

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

                                        </a>


                                        <!-- PRICE -->

                                        <h2>
                                            ₹{{ number_format($product->price, 2) }}
                                        </h2>


                                        <!-- PRODUCT NAME -->

                                        <p>

                                            <a href="{{ route('product.details', $product->id) }}">

                                                {{ $product->product_name }}

                                            </a>

                                        </p>


                                        <!-- CATEGORY -->

                                        @if($product->category)

                                            <small>
                                                {{ $product->category->cat_name }}
                                            </small>

                                        @endif


                                        <br><br>


                                        <!-- ADD TO CART -->

                                        <a
                                            href="{{ route('cart.add', $product->id) }}"
                                            class="btn btn-default add-to-cart"
                                        >

                                            <i class="fa fa-shopping-cart"></i>

                                            Add to cart

                                        </a>

                                    </div>
                                    <!-- /productinfo -->


                                    <!-- PRODUCT OVERLAY -->

                                    <div class="product-overlay">

                                        <div class="overlay-content">

                                            <h2>
                                                ₹{{ number_format($product->price, 2) }}
                                            </h2>

                                            <p>

                                                {{ $product->product_name }}

                                            </p>


                                            <a
                                                href="{{ route('product.details', $product->id) }}"
                                                class="btn btn-default"
                                            >

                                                View Details

                                            </a>

                                        </div>

                                    </div>
                                    <!-- /product-overlay -->

                                </div>


                                <!-- WISHLIST / COMPARE -->

                                <div class="choose">

                                    <ul class="nav nav-pills nav-justified">

                                        <li>

                                            <a href="#">

                                                <i class="fa fa-plus-square"></i>

                                                Add to wishlist

                                            </a>

                                        </li>

                                        <li>

                                            <a href="#">

                                                <i class="fa fa-plus-square"></i>

                                                Add to compare

                                            </a>

                                        </li>

                                    </ul>

                                </div>

                            </div>

                        </div>

                    @empty

                        <div class="col-sm-12 text-center">

                            <h3>
                                No products found.
                            </h3>

                            <p>
                                Please check back later.
                            </p>

                        </div>

                    @endforelse


                    <!-- PAGINATION -->

                    @if($products->hasPages())

                        <div class="col-sm-12">

                            <ul class="pagination">

                                {{ $products->links() }}

                            </ul>

                        </div>

                    @endif

                </div>
                <!-- /features_items -->

            </div>
            <!-- /PRODUCTS -->

        </div>

    </div>
</section>

@endsection
