
@extends('frontend.layout')

@section('content')

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
                        >

                    </div>

                </div>

            </div>
            <!-- /LEFT SIDEBAR -->


            <!-- PRODUCT DETAILS -->
            <div class="col-sm-9 padding-right">

                <div class="product-details">

                    <!-- PRODUCT IMAGE -->
                    <div class="col-sm-5">

                        <div class="view-product">

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

                            <h3>ZOOM</h3>

                        </div>


                        <!-- SIMILAR PRODUCTS IMAGES -->
                        <div
                            id="similar-product"
                            class="carousel slide"
                            data-ride="carousel"
                        >

                            <div class="carousel-inner">

                                <div class="item active">

                                    <a href="#">
                                        <img
                                            src="{{ asset('assets/frontend/images/product-details/similar1.jpg') }}"
                                            alt=""
                                        >
                                    </a>

                                    <a href="#">
                                        <img
                                            src="{{ asset('assets/frontend/images/product-details/similar2.jpg') }}"
                                            alt=""
                                        >
                                    </a>

                                    <a href="#">
                                        <img
                                            src="{{ asset('assets/frontend/images/product-details/similar3.jpg') }}"
                                            alt=""
                                        >
                                    </a>

                                </div>

                                <div class="item">

                                    <a href="#">
                                        <img
                                            src="{{ asset('assets/frontend/images/product-details/similar1.jpg') }}"
                                            alt=""
                                        >
                                    </a>

                                    <a href="#">
                                        <img
                                            src="{{ asset('assets/frontend/images/product-details/similar2.jpg') }}"
                                            alt=""
                                        >
                                    </a>

                                    <a href="#">
                                        <img
                                            src="{{ asset('assets/frontend/images/product-details/similar3.jpg') }}"
                                            alt=""
                                        >
                                    </a>

                                </div>

                            </div>


                            <a
                                class="left item-control"
                                href="#similar-product"
                                data-slide="prev"
                            >
                                <i class="fa fa-angle-left"></i>
                            </a>

                            <a
                                class="right item-control"
                                href="#similar-product"
                                data-slide="next"
                            >
                                <i class="fa fa-angle-right"></i>
                            </a>

                        </div>

                    </div>
                    <!-- /PRODUCT IMAGE -->


                    <!-- PRODUCT INFORMATION -->
                    <div class="col-sm-7">

                        <div class="product-information">

                            <h2>
                                {{ $product->product_name }}
                            </h2>

                            <p>
                                Product ID: {{ $product->id }}
                            </p>


                            <span>

                                <span>
                                    ₹{{ number_format($product->price, 2) }}
                                </span>

                                <!-- QUANTITY -->
                                <label>Quantity:</label>

                                <input
                                    type="number"
                                    name="quantity"
                                    value="1"
                                    min="1"
                                    style="width:60px;"
                                >


                                <!-- ADD TO CART -->
                                <a
                                    href="{{ route('cart.add', $product->id) }}"
                                    class="btn btn-fefault cart"
                                >

                                    <i class="fa fa-shopping-cart"></i>

                                    Add to cart

                                </a>

                            </span>


                            <!-- AVAILABILITY -->
                            <p>

                                <b>Availability:</b>

                                @if($product->status == 1)

                                    <span style="color:green;">
                                        In Stock
                                    </span>

                                @else

                                    <span style="color:red;">
                                        Out of Stock
                                    </span>

                                @endif

                            </p>


                            <!-- CONDITION -->
                            <p>
                                <b>Condition:</b> New
                            </p>


                            <!-- BRAND -->
                            <p>

                                <b>Brand:</b>

                                @if($product->brand)

                                    {{ $product->brand->brand_name }}

                                @else

                                    N/A

                                @endif

                            </p>


                            <!-- CATEGORY -->
                            <p>

                                <b>Category:</b>

                                @if($product->category)

                                    {{ $product->category->cat_name }}

                                @else

                                    N/A

                                @endif

                            </p>


                        </div>
                        <!-- /product-information -->

                    </div>

                </div>
                <!-- /product-details -->


                <!-- DESCRIPTION -->
                <div class="category-tab shop-details-tab">

                    <div class="col-sm-12">

                        <ul class="nav nav-tabs">

                            <li class="active">
                                <a href="#details" data-toggle="tab">
                                    Details
                                </a>
                            </li>

                        </ul>


                        <div class="tab-content">

                            <div
                                class="tab-pane fade active in"
                                id="details"
                            >

                                <p>
                                    {{ $product->description }}
                                </p>

                            </div>

                        </div>

                    </div>

                </div>
                <!-- /DESCRIPTION -->


                <!-- RECOMMENDED PRODUCTS -->
                <div class="recommended_items">

                    <h2 class="title text-center">
                        Recommended Items
                    </h2>


                    <div
                        id="recommended-item-carousel"
                        class="carousel slide"
                        data-ride="carousel"
                    >

                        <div class="carousel-inner">

                            @forelse($recommendedProducts->chunk(3) as $chunkIndex => $productChunk)

                                <div class="item {{ $chunkIndex == 0 ? 'active' : '' }}">

                                    @foreach($productChunk as $recommended)

                                        <div class="col-sm-4">

                                            <div class="product-image-wrapper">

                                                <div class="single-products">

                                                    <div class="productinfo text-center">

                                                        <a
                                                            href="{{ route('product.details', $recommended->id) }}"
                                                        >

                                                            @if($recommended->image)

                                                                <img
                                                                    src="{{ asset('uploads/products/' . $recommended->image) }}"
                                                                    alt="{{ $recommended->product_name }}"
                                                                >

                                                            @else

                                                                <img
                                                                    src="{{ asset('assets/frontend/images/home/gallery1.jpg') }}"
                                                                    alt="{{ $recommended->product_name }}"
                                                                >

                                                            @endif

                                                        </a>


                                                        <h2>
                                                            ₹{{ number_format($recommended->price, 2) }}
                                                        </h2>


                                                        <p>

                                                            <a
                                                                href="{{ route('product.details', $recommended->id) }}"
                                                            >
                                                                {{ $recommended->product_name }}
                                                            </a>

                                                        </p>


                                                        <a
                                                            href="{{ route('cart.add', $recommended->id) }}"
                                                            class="btn btn-default add-to-cart"
                                                        >

                                                            <i class="fa fa-shopping-cart"></i>

                                                            Add to cart

                                                        </a>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    @endforeach

                                </div>

                            @empty

                                <div class="item active">

                                    <div class="col-sm-12 text-center">

                                        <p>
                                            No recommended products available.
                                        </p>

                                    </div>

                                </div>

                            @endforelse

                        </div>


                        <a
                            class="left recommended-item-control"
                            href="#recommended-item-carousel"
                            data-slide="prev"
                        >

                            <i class="fa fa-angle-left"></i>

                        </a>


                        <a
                            class="right recommended-item-control"
                            href="#recommended-item-carousel"
                            data-slide="next"
                        >

                            <i class="fa fa-angle-right"></i>

                        </a>

                    </div>

                </div>
                <!-- /recommended_items -->

            </div>

        </div>

    </div>

</section>

@endsection

