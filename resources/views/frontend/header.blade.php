
<header id="header"><!--header-->

    <!-- ================= HEADER TOP ================= -->
    <div class="header_top">
        <div class="container">
            <div class="row">

                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">

                            <li>
                                <a href="tel:+2950188821">
                                    <i class="fa fa-phone"></i>
                                    +2 95 01 88 821
                                </a>
                            </li>

                            <li>
                                <a href="mailto:info@domain.com">
                                    <i class="fa fa-envelope"></i>
                                    info@domain.com
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="social-icons pull-right">

                        <ul class="nav navbar-nav">

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
                                    <i class="fa fa-linkedin"></i>
                                </a>
                            </li>

                            <li>
                                <a href="#">
                                    <i class="fa fa-dribbble"></i>
                                </a>
                            </li>

                            <li>
                                <a href="#">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            </li>

                        </ul>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- ================= /HEADER TOP ================= -->


    <!-- ================= HEADER MIDDLE ================= -->
    <div class="header-middle">
        <div class="container">
            <div class="row">

                <!-- LOGO -->
                <div class="col-sm-4">

                    <div class="logo pull-left">

                        <a href="{{ route('index') }}">

                            <img
                                src="{{ asset('assets/frontend/images/home/logo.png') }}"
                                alt="Logo"
                            >

                        </a>

                    </div>


                    <!-- COUNTRY -->
                    <div class="btn-group pull-right">

                        <div class="btn-group">

                            <button
                                type="button"
                                class="btn btn-default dropdown-toggle usa"
                                data-toggle="dropdown"
                            >
                                USA
                                <span class="caret"></span>
                            </button>

                            <ul class="dropdown-menu">

                                <li>
                                    <a href="#">Canada</a>
                                </li>

                                <li>
                                    <a href="#">UK</a>
                                </li>

                            </ul>

                        </div>


                        <!-- CURRENCY -->
                        <div class="btn-group">

                            <button
                                type="button"
                                class="btn btn-default dropdown-toggle usa"
                                data-toggle="dropdown"
                            >
                                DOLLAR
                                <span class="caret"></span>
                            </button>

                            <ul class="dropdown-menu">

                                <li>
                                    <a href="#">Canadian Dollar</a>
                                </li>

                                <li>
                                    <a href="#">Pound</a>
                                </li>

                            </ul>

                        </div>

                    </div>

                </div>


                <!-- RIGHT SHOP MENU -->
                <div class="col-sm-8">

                    <div class="shop-menu pull-right">

                        <ul class="nav navbar-nav">


                            <!-- ACCOUNT / LOGIN -->
                            @auth

                                <li>
                                    <a href="#">
                                        <i class="fa fa-user"></i>
                                        {{ Auth::user()->name }}
                                    </a>
                                </li>

                            @else

                                <li>
                                    <a href="{{ route('login') }}">
                                        <i class="fa fa-lock"></i>
                                        Login
                                    </a>
                                </li>

                            @endauth


                            <!-- WISHLIST -->
                            <li>
                                <a href="#">
                                    <i class="fa fa-star"></i>
                                    Wishlist
                                </a>
                            </li>


                            <!-- CHECKOUT -->
                            <li>
                                <a href="{{ route('checkout.index') }}">
                                    <i class="fa fa-crosshairs"></i>
                                    Checkout
                                </a>
                            </li>


                            <!-- CART -->
                            <li>
                                <a href="{{ route('cart.index') }}">
                                    <i class="fa fa-shopping-cart"></i>
                                    Cart
                                </a>
                            </li>


                            <!-- MY ORDERS -->
                            @auth

                                <li>
                                    <a href="{{ route('orders.index') }}">
                                        <i class="fa fa-list"></i>
                                        My Orders
                                    </a>
                                </li>

                            @endauth


                            <!-- LOGOUT -->
                            @auth

                                <li>

                                    <form
                                        action="{{ route('logout') }}"
                                        method="POST"
                                        style="display:inline;"
                                    >

                                        @csrf

                                        <button
                                            type="submit"
                                            style="
                                                background:none;
                                                border:none;
                                                padding:14px 12px;
                                                color:#696763;
                                            "
                                        >

                                            <i class="fa fa-sign-out"></i>
                                            Logout

                                        </button>

                                    </form>

                                </li>

                            @endauth


                            <!-- ADMIN LOGIN -->
                            <li>
                                <a href="{{ route('admin.login') }}">
                                    <i class="fa fa-user-secret"></i>
                                    Admin Login
                                </a>
                            </li>


                        </ul>

                    </div>

                </div>

            </div>
        </div>
    </div>
    <!-- ================= /HEADER MIDDLE ================= -->


    <!-- ================= HEADER BOTTOM ================= -->
    <div class="header-bottom">

        <div class="container">

            <div class="row">

                <div class="col-sm-9">


                    <!-- MOBILE MENU BUTTON -->
                    <div class="navbar-header">

                        <button
                            type="button"
                            class="navbar-toggle"
                            data-toggle="collapse"
                            data-target=".navbar-collapse"
                        >

                            <span class="sr-only">
                                Toggle navigation
                            </span>

                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>

                        </button>

                    </div>


                    <!-- MAIN MENU -->
                    <div class="mainmenu pull-left">

                        <ul class="nav navbar-nav collapse navbar-collapse">


                            <!-- HOME -->
                            <li>

                                <a
                                    href="{{ route('index') }}"
                                    class="{{ request()->routeIs('index') ? 'active' : '' }}"
                                >
                                    Home
                                </a>

                            </li>


                            <!-- SHOP -->
                            <li class="dropdown">

                                <a href="{{ route('shop') }}">

                                    Shop

                                    <i class="fa fa-angle-down"></i>

                                </a>


                                <ul role="menu" class="sub-menu">


                                    <!-- PRODUCTS -->
                                    <li>

                                        <a href="{{ route('shop') }}">
                                            Products
                                        </a>

                                    </li>


                                    <!-- CART -->
                                    <li>

                                        <a href="{{ route('cart.index') }}">
                                            Cart
                                        </a>

                                    </li>


                                    <!-- CHECKOUT -->
                                    <li>

                                        <a href="{{ route('checkout.index') }}">
                                            Checkout
                                        </a>

                                    </li>


                                    <!-- MY ORDERS -->
                                    @auth

                                        <li>

                                            <a href="{{ route('orders.index') }}">
                                                My Orders
                                            </a>

                                        </li>

                                    @endauth


                                </ul>

                            </li>


                            <!-- BLOG -->
                            <li class="dropdown">

                                <a href="{{ route('blogs') }}">

                                    Blog

                                    <i class="fa fa-angle-down"></i>

                                </a>


                                <ul role="menu" class="sub-menu">

                                    <li>

                                        <a href="{{ route('blogs') }}">
                                            Blog List
                                        </a>

                                    </li>

                                </ul>

                            </li>


                            <!-- CONTACT -->
                            <li>

                                <a href="{{ route('contact') }}">
                                    Contact
                                </a>

                            </li>


                        </ul>

                    </div>
                    <!-- /MAIN MENU -->

                </div>


                <!-- ================= SEARCH ================= -->
                <div class="col-sm-3">

                    <div class="search_box pull-right">

                        <input
                            type="text"
                            id="search"
                            placeholder="Search"
                            autocomplete="off"
                        >

                    </div>

                </div>
                <!-- ================= /SEARCH ================= -->


            </div>

        </div>

    </div>
    <!-- ================= /HEADER BOTTOM ================= -->


</header>
<!-- /HEADER -->


<!-- ================= SEARCH SCRIPT ================= -->

@push('scripts')

<script>

$(document).ready(function () {


    /*
    |--------------------------------------------------------------------------
    | PRODUCT SEARCH
    |--------------------------------------------------------------------------
    */

    function searchProduct() {

        let keyword = $('#search').val().trim();


        if (keyword.length > 0) {

            window.location.href =
                "{{ route('shop') }}?search=" +
                encodeURIComponent(keyword);

        }

    }


    /*
    |--------------------------------------------------------------------------
    | SEARCH WHEN PRESS ENTER
    |--------------------------------------------------------------------------
    */

    $('#search').on('keypress', function (e) {

        if (e.which === 13) {

            searchProduct();

        }

    });


});

</script>

@endpush

<!-- ================= /SEARCH SCRIPT ================= -->
```
