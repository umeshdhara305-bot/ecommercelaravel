<footer id="footer">

    {{-- ================= FOOTER TOP ================= --}}
    <div class="footer-top">
        <div class="container">
            <div class="row">

                {{-- Company Information --}}
                <div class="col-sm-2">
                    <div class="companyinfo">

                        <h2>
                            <span>e</span>-shopper
                        </h2>

                        <p>
                            Your trusted online shopping destination.
                            Shop quality products at the best prices.
                        </p>

                    </div>
                </div>


                {{-- Video Gallery --}}
                <div class="col-sm-7">

                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <a href="{{ route('shop') }}">
                                <div class="iframe-img">
                                    <img src="{{ asset('assets/frontend/images/home/iframe1.png') }}" alt="">
                                </div>

                                <div class="overlay-icon">
                                    <i class="fa fa-play-circle-o"></i>
                                </div>
                            </a>

                            <p>New Collection</p>
                            <h2>SHOP NOW</h2>
                        </div>
                    </div>


                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <a href="{{ route('shop') }}">
                                <div class="iframe-img">
                                    <img src="{{ asset('assets/frontend/images/home/iframe2.png') }}" alt="">
                                </div>

                                <div class="overlay-icon">
                                    <i class="fa fa-play-circle-o"></i>
                                </div>
                            </a>

                            <p>Latest Products</p>
                            <h2>SHOP NOW</h2>
                        </div>
                    </div>


                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <a href="{{ route('shop') }}">
                                <div class="iframe-img">
                                    <img src="{{ asset('assets/frontend/images/home/iframe3.png') }}" alt="">
                                </div>

                                <div class="overlay-icon">
                                    <i class="fa fa-play-circle-o"></i>
                                </div>
                            </a>

                            <p>Best Sellers</p>
                            <h2>SHOP NOW</h2>
                        </div>
                    </div>


                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <a href="{{ route('shop') }}">
                                <div class="iframe-img">
                                    <img src="{{ asset('assets/frontend/images/home/iframe4.png') }}" alt="">
                                </div>

                                <div class="overlay-icon">
                                    <i class="fa fa-play-circle-o"></i>
                                </div>
                            </a>

                            <p>Special Offers</p>
                            <h2>SHOP NOW</h2>
                        </div>
                    </div>

                </div>


                {{-- Address --}}
                <div class="col-sm-3">

                    <div class="address">

                        <img src="{{ asset('assets/frontend/images/home/map.png') }}" alt="Location">

                        @php
                            $setting = \App\Models\Setting::first();
                        @endphp

                        @if($setting)
                            <p>
                                {{ $setting->address ?? '' }}
                                @if(!empty($setting->city))
                                    {{ $setting->city }},
                                @endif
                                @if(!empty($setting->country))
                                    {{ $setting->country }}
                                @endif
                            </p>
                        @else
                            <p>Our Store Location</p>
                        @endif

                    </div>

                </div>

            </div>
        </div>
    </div>



    {{-- ================= FOOTER WIDGET ================= --}}
    <div class="footer-widget">

        <div class="container">

            <div class="row">


                {{-- Services --}}
                <div class="col-sm-2">

                    <div class="single-widget">

                        <h2>Services</h2>

                        <ul class="nav nav-pills nav-stacked">

                            <li>
                                <a href="{{ route('contact') }}">
                                    Contact Us
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('orders.index') }}">
                                    Order Status
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('shop') }}">
                                    Shop
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('cart.index') }}">
                                    Shopping Cart
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('checkout.index') }}">
                                    Checkout
                                </a>
                            </li>

                        </ul>

                    </div>

                </div>



                {{-- Quick Shop --}}
                <div class="col-sm-2">

                    <div class="single-widget">

                        <h2>Quick Shop</h2>

                        <ul class="nav nav-pills nav-stacked">

                            <li>
                                <a href="{{ route('shop') }}">
                                    All Products
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('shop') }}">
                                    Mens
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('shop') }}">
                                    Womens
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('shop') }}">
                                    Kids
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('shop') }}">
                                    Sportswear
                                </a>
                            </li>

                        </ul>

                    </div>

                </div>



                {{-- Policies --}}
                <div class="col-sm-2">

                    <div class="single-widget">

                        <h2>Policies</h2>

                        <ul class="nav nav-pills nav-stacked">

                            <li>
                                <a href="#">
                                    Terms of Use
                                </a>
                            </li>

                            <li>
                                <a href="#">
                                    Privacy Policy
                                </a>
                            </li>

                            <li>
                                <a href="#">
                                    Refund Policy
                                </a>
                            </li>

                            <li>
                                <a href="#">
                                    Billing System
                                </a>
                            </li>

                            <li>
                                <a href="#">
                                    Ticket System
                                </a>
                            </li>

                        </ul>

                    </div>

                </div>



                {{-- About Shopper --}}
                <div class="col-sm-2">

                    <div class="single-widget">

                        <h2>About Shopper</h2>

                        <ul class="nav nav-pills nav-stacked">

                            <li>
                                <a href="{{ route('index') }}">
                                    Home
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('shop') }}">
                                    Shop
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('blogs') }}">
                                    Blog
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('contact') }}">
                                    Contact Us
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('cart.index') }}">
                                    Cart
                                </a>
                            </li>

                        </ul>

                    </div>

                </div>



                {{-- Newsletter --}}
                <div class="col-sm-3 col-sm-offset-1">

                    <div class="single-widget">

                        <h2>Newsletter</h2>

                        <form action="#" class="searchform">

                            <input
                                type="email"
                                placeholder="Your email address"
                            />

                            <button
                                type="submit"
                                class="btn btn-default"
                            >
                                <i class="fa fa-arrow-circle-o-right"></i>
                            </button>

                            <p>
                                Get the latest updates from our site
                                and stay updated with our products.
                            </p>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>



    {{-- ================= FOOTER BOTTOM ================= --}}
    <div class="footer-bottom">

        <div class="container">

            <div class="row">

                <p class="pull-left">

                    Copyright © {{ date('Y') }}

                    @php
                        $setting = \App\Models\Setting::first();
                    @endphp

                    {{ $setting->site_name ?? 'E-SHOPPER' }}

                    All rights reserved.

                </p>


                <p class="pull-right">

                    Developed by
                    <span>
                        <a href="#">
                            Umesh Dhara
                        </a>
                    </span>

                </p>

            </div>

        </div>

    </div>

</footer>