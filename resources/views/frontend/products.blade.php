@extends('frontend.layout')

@section('content')

<section>
    <div class="container">
        <div class="row">

            @include('frontend.sidebar')

            <div class="col-sm-9 padding-right">

                <h2 class="title text-center">{{ $title }}</h2>

                @forelse($products as $product)

                <div class="col-sm-4">
                    <div class="product-image-wrapper">

                        <div class="single-products">

                            <div class="productinfo text-center">

                                <img src="{{ asset('uploads/products/'.$product->image) }}" alt="">

                                <h2>${{ $product->price }}</h2>

                                <p>{{ $product->product_name }}</p>

                                <a href="#" class="btn btn-default add-to-cart">
                                    <i class="fa fa-shopping-cart"></i>
                                    Add to cart
                                </a>

                            </div>

                        </div>

                    </div>
                </div>

                @empty

                <h4 class="text-center">
                    No Products Found
                </h4>

                @endforelse

            </div>

        </div>
    </div>
</section>

@endsection