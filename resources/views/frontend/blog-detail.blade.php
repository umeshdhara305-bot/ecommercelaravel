
@extends('frontend.layout')

@section('content')

@if(session('success'))

    <div class="container">

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    </div>

@endif

<section>
    <div class="container">
        <div class="row">

            {{-- ================= LEFT SIDEBAR ================= --}}
            <div class="col-sm-3">
                <div class="left-sidebar">

                    {{-- Categories --}}
                    <h2>Category</h2>

                    <div class="panel-group category-products" id="accordian">

                        @forelse($categories as $category)

                            <div class="panel panel-default">

                                <div class="panel-heading">
                                    <h4 class="panel-title">

                                        <a data-toggle="collapse"
                                           data-parent="#accordian"
                                           href="#category{{ $category->id }}">

                                            @if($category->products->count() > 0)
                                                <span class="badge pull-right">
                                                    <i class="fa fa-plus"></i>
                                                </span>
                                            @endif

                                            {{ $category->cat_name }}

                                        </a>
                                    </h4>
                                </div>

                                @if($category->products->count() > 0)

                                    <div id="category{{ $category->id }}"
                                         class="panel-collapse collapse">

                                        <div class="panel-body">

                                            <ul>

                                                @foreach($category->products->take(10) as $product)

                                                    <li>
                                                        <a href="{{ route('product.details', $product->id) }}">
                                                            {{ $product->product_name }}
                                                        </a>
                                                    </li>

                                                @endforeach

                                            </ul>

                                        </div>

                                    </div>

                                @endif

                            </div>

                        @empty

                            <p>No categories available.</p>

                        @endforelse

                    </div>


                    {{-- Brands --}}
                    <div class="brands_products">

                        <h2>Brands</h2>

                        <div class="brands-name">

                            <ul class="nav nav-pills nav-stacked">

                                @forelse($brands as $brand)

                                    <li>

                                        <a href="#">

                                            <span class="pull-right">
                                                ({{ $brand->products->count() }})
                                            </span>

                                            {{ $brand->brand_name }}

                                        </a>

                                    </li>

                                @empty

                                    <li>
                                        No brands available.
                                    </li>

                                @endforelse

                            </ul>

                        </div>

                    </div>


                    {{-- Price Range --}}
                    <div class="price-range">

                        <h2>Price Range</h2>

                        <div class="well">

                            <input type="text"
                                   class="span2"
                                   value=""
                                   data-slider-min="0"
                                   data-slider-max="600"
                                   data-slider-step="5"
                                   data-slider-value="[250,450]"
                                   id="sl2">

                            <br>

                            <b>₹ 0</b>
                            <b class="pull-right">₹ 600</b>

                        </div>

                    </div>


                    {{-- Shipping --}}
                    <div class="shipping text-center">

                        <img src="{{ asset('assets/frontend/images/home/shipping.jpg') }}"
                             alt="Shipping">

                    </div>

                </div>
            </div>


            {{-- ================= BLOG CONTENT ================= --}}
            <div class="col-sm-9">

                <div class="blog-post-area">

                    <h2 class="title text-center">
                        {{ $blog->title }}
                    </h2>


                    {{-- Blog Post --}}
                    <div class="single-blog-post">

                        <h3>{{ $blog->title }}</h3>


                        {{-- Post Meta --}}
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

                            <span>

                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>

                            </span>

                        </div>


                        {{-- Blog Image --}}
                        <a href="#">

                            @if($blog->image)

                                <img src="{{ asset('uploads/blog/' . $blog->image) }}"
                                     alt="{{ $blog->title }}">

                            @else

                                <img src="{{ asset('assets/frontend/images/blog/blog-one.jpg') }}"
                                     alt="{{ $blog->title }}">

                            @endif

                        </a>


                        {{-- Blog Description --}}
                        <p>
                            {!! nl2br(e($blog->description)) !!}
                        </p>


                        {{-- Previous / Next --}}
                        <div class="pager-area">

                            <ul class="pager pull-right">

                                @if($previousBlog)

                                    <li>
                                        <a href="{{ route('blog.detail', $previousBlog->slug) }}">
                                            Previous
                                        </a>
                                    </li>

                                @endif


                                @if($nextBlog)

                                    <li>
                                        <a href="{{ route('blog.detail', $nextBlog->slug) }}">
                                            Next
                                        </a>
                                    </li>

                                @endif

                            </ul>

                        </div>

                    </div>

                </div>


                {{-- ================= RATING ================= --}}
                <div class="rating-area">

                    <ul class="ratings">

                        <li class="rate-this">
                            Rate this item:
                        </li>

                        <li>

                            <i class="fa fa-star color"></i>
                            <i class="fa fa-star color"></i>
                            <i class="fa fa-star color"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>

                        </li>

                        <li class="color">
                            (0 votes)
                        </li>

                    </ul>

                </div>


                {{-- ================= SOCIAL SHARE ================= --}}
                <div class="socials-share">

                    <a href="#">
                        <img src="{{ asset('assets/frontend/images/blog/socials.png') }}"
                             alt="Social Share">
                    </a>

                </div>


                {{-- ================= AUTHOR ================= --}}
                <div class="media commnets">

                    <a class="pull-left" href="#">

                        <img class="media-object"
                             src="{{ asset('assets/frontend/images/blog/man-one.jpg') }}"
                             alt="Admin">

                    </a>

                    <div class="media-body">

                        <h4 class="media-heading">
                            Admin
                        </h4>

                        <p>
                            Thank you for reading our blog.
                            Check out our other posts for more useful
                            information and updates.
                        </p>

                        <div class="blog-socials">

                            <ul>

                                <li>
                                    <a href="#">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <i class="fa fa-instagram"></i>
                                    </a>
                                </li>

                            </ul>

                            <a class="btn btn-primary"
                               href="{{ route('blogs') }}">

                                Other Posts

                            </a>

                        </div>

                    </div>

                </div>


                {{-- ================= COMMENTS ================= --}}
           <div class="response-area">

    <h2>
        {{ $comments->count() }} 
        {{ $comments->count() == 1 ? 'COMMENT' : 'COMMENTS' }}
    </h2>

    @if($comments->count() > 0)

        <ul class="media-list">

            @foreach($comments as $comment)

                <li class="media">

                    <a class="pull-left" href="#">

                        <img class="media-object"
                             src="{{ asset('assets/frontend/images/blog/man-one.jpg') }}"
                             alt="{{ $comment->name }}">

                    </a>

                    <div class="media-body">

                        <ul class="sinlge-post-meta">

                            <li>
                                <i class="fa fa-user"></i>
                                {{ $comment->name }}
                            </li>

                            <li>
                                <i class="fa fa-clock-o"></i>
                                {{ $comment->created_at->format('h:i A') }}
                            </li>

                            <li>
                                <i class="fa fa-calendar"></i>
                                {{ $comment->created_at->format('M d, Y') }}
                            </li>

                        </ul>

                        <p>
                            {{ $comment->message }}
                        </p>

                        @if($comment->website)

                            <a href="{{ $comment->website }}"
                               target="_blank"
                               class="btn btn-primary">

                                Visit Website

                            </a>

                        @endif

                    </div>

                </li>

            @endforeach

        </ul>

    @else

        <p>
            No comments yet. Be the first to comment!
        </p>

    @endif

</div>


                {{-- ================= COMMENT FORM ================= --}}
               <div class="replay-box">

    <h2>Leave a reply</h2>

    <form id="comment-form"
          action="{{ route('blog.comment', $blog->id) }}"
          method="POST">

        @csrf

        <div class="row">

            <div class="col-sm-4">

                <div class="blank-arrow">
                    <label>Your Name</label>
                </div>

                <span>*</span>

                <input type="text"
                       name="name"
                       value="{{ old('name') }}"
                       placeholder="Write your name..."
                       required>

                @error('name')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                @enderror


                <div class="blank-arrow">
                    <label>Email Address</label>
                </div>

                <span>*</span>

                <input type="email"
                       name="email"
                       value="{{ old('email') }}"
                       placeholder="Your email address..."
                       required>

                @error('email')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                @enderror


                <div class="blank-arrow">
                    <label>Website</label>
                </div>

                <input type="text"
                       name="website"
                       value="{{ old('website') }}"
                       placeholder="Your website...">

            </div>


            <div class="col-sm-8">

                <div class="text-area">

                    <div class="blank-arrow">
                        <label>Your Message</label>
                    </div>

                    <span>*</span>

                    <textarea name="message"
                              rows="11"
                              placeholder="Write your comment..."
                              required>{{ old('message') }}</textarea>

                    @error('message')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror

                    <button type="submit"
                            class="btn btn-primary">

                        Post Comment

                    </button>

                </div>

            </div>

        </div>

    </form>

</div>

            </div>

        </div>
    </div>
</section>

@endsection
