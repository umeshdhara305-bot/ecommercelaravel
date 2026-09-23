
@extends('frontend.layout')

@section('content')

<section>

    <div class="container">

        <div class="row">

            <!-- LEFT SIDEBAR -->
            <div class="col-sm-3">

                <div class="left-sidebar">

                    <!-- CATEGORY -->
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
                    <!-- /shipping -->

                </div>

            </div>
            <!-- /LEFT SIDEBAR -->


            <!-- BLOG -->
            <div class="col-sm-9">

                <div class="blog-post-area">

                    <h2 class="title text-center">
                        Latest From our Blog
                    </h2>


                    @forelse($blogs as $blog)

                        <div class="single-blog-post">

                            <!-- BLOG TITLE -->
                            <h3>
                                {{ $blog->title }}
                            </h3>


                            <!-- POST META -->
                            <div class="post-meta">

                                <ul>

                                    <li>
                                        <i class="fa fa-user"></i>

                                        Admin
                                    </li>

                                    <li>
                                        <i class="fa fa-clock-o"></i>

                                        {{ $blog->created_at->format('h:i A') }}
                                    </li>

                                    <li>
                                        <i class="fa fa-calendar"></i>

                                        {{ $blog->created_at->format('M d, Y') }}
                                    </li>

                                </ul>


                                <!-- RATING -->

                                <span>

                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half-o"></i>

                                </span>

                            </div>
                            <!-- /post-meta -->


                            <!-- BLOG IMAGE -->

                            @if($blog->image)

                                <a href="{{ route('blog.detail', $blog->slug) }}">

                                    <img
                                        src="{{ asset('uploads/blog/' . $blog->image) }}"
                                        alt="{{ $blog->title }}"
                                    >

                                </a>

                            @endif


                            <!-- BLOG DESCRIPTION -->

                            <p>

                                {{ Str::limit(strip_tags($blog->description), 250) }}

                            </p>


                            <!-- READ MORE -->

                            <a
                                class="btn btn-primary"
                                href="{{ route('blog.detail', $blog->slug) }}"
                            >

                                Read More

                            </a>

                        </div>

                    @empty

                        <div class="text-center">

                            <h3>
                                No blog posts available.
                            </h3>

                            <p>
                                Please check back later.
                            </p>

                        </div>

                    @endforelse


                    <!-- PAGINATION -->

                    @if($blogs->hasPages())

                        <div class="pagination-area">

                            {{ $blogs->links() }}

                        </div>

                    @endif

                </div>

            </div>
            <!-- /BLOG -->

        </div>

    </div>

</section>

@endsection

