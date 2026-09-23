@include('admin.includes.header')
@include('admin.includes.sidebar')

<style>
    .dashboard-card {
        border: none !important;
        border-radius: 10px;
        transition: all 0.3s ease;
        cursor: pointer;
        overflow: hidden;
    }

    .dashboard-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15) !important;
    }

    .dashboard-link {
        text-decoration: none !important;
        color: inherit !important;
        display: block;
    }

    /* Border Colors */
    .border-left-primary {
        border-left: 5px solid #6777ef !important;
    }

    .border-left-success {
        border-left: 5px solid #47c363 !important;
    }

    .border-left-warning {
        border-left: 5px solid #ffa426 !important;
    }

    .border-left-danger {
        border-left: 5px solid #fc544b !important;
    }

    .border-left-info {
        border-left: 5px solid #3abaf4 !important;
    }

    /* Icon Colors */
    .icon-primary {
        color: #6777ef !important;
    }

    .icon-success {
        color: #47c363 !important;
    }

    .icon-warning {
        color: #ffa426 !important;
    }

    .icon-danger {
        color: #fc544b !important;
    }

    .icon-info {
        color: #3abaf4 !important;
    }

    /* Label Colors */
    .text-primary-custom {
        color: #6777ef !important;
    }

    .text-success-custom {
        color: #47c363 !important;
    }

    .text-warning-custom {
        color: #ffa426 !important;
    }

    .text-danger-custom {
        color: #fc544b !important;
    }

    .text-info-custom {
        color: #3abaf4 !important;
    }

    .dashboard-card .card-body {
        padding: 25px;
    }
</style>


<div class="main-content">

    <section class="section">
        <h2>Dashboard</h2>
    </section>

    <div class="row">

        {{-- Total Customers --}}
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="{{ route('admin.customers.index') }}"
               class="dashboard-link">

                <div class="card shadow h-100 dashboard-card border-left-primary">
                    <div class="card-body">

                        <div class="row align-items-center">

                            <div class="col mr-2">

                                <div class="text-xs font-weight-bold text-uppercase mb-2 text-primary-custom">
                                    Total Customers
                                </div>

                                <div class="h4 mb-0 font-weight-bold text-dark">
                                    {{ $customerCount }}
                                </div>

                            </div>

                            <div class="col-auto">
                                <i class="fa fa-users fa-2x icon-primary"></i>
                            </div>

                        </div>

                    </div>
                </div>

            </a>
        </div>


        {{-- Total Products --}}
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="{{ route('product.index') }}"
               class="dashboard-link">

                <div class="card shadow h-100 dashboard-card border-left-success">
                    <div class="card-body">

                        <div class="row align-items-center">

                            <div class="col mr-2">

                                <div class="text-xs font-weight-bold text-uppercase mb-2 text-success-custom">
                                    Total Products
                                </div>

                                <div class="h4 mb-0 font-weight-bold text-dark">
                                    {{ $productCount }}
                                </div>

                            </div>

                            <div class="col-auto">
                                <i class="fa fa-shopping-bag fa-2x icon-success"></i>
                            </div>

                        </div>

                    </div>
                </div>

            </a>
        </div>


        {{-- Total Categories --}}
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="{{ route('category.view') }}"
               class="dashboard-link">

                <div class="card shadow h-100 dashboard-card border-left-warning">
                    <div class="card-body">

                        <div class="row align-items-center">

                            <div class="col mr-2">

                                <div class="text-xs font-weight-bold text-uppercase mb-2 text-warning-custom">
                                    Total Categories
                                </div>

                                <div class="h4 mb-0 font-weight-bold text-dark">
                                    {{ $categoryCount }}
                                </div>

                            </div>

                            <div class="col-auto">
                                <i class="fa fa-list fa-2x icon-warning"></i>
                            </div>

                        </div>

                    </div>
                </div>

            </a>
        </div>


        {{-- Total Brands --}}
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="{{ route('brand.index') }}"
               class="dashboard-link">

                <div class="card shadow h-100 dashboard-card border-left-danger">
                    <div class="card-body">

                        <div class="row align-items-center">

                            <div class="col mr-2">

                                <div class="text-xs font-weight-bold text-uppercase mb-2 text-danger-custom">
                                    Total Brands
                                </div>

                                <div class="h4 mb-0 font-weight-bold text-dark">
                                    {{ $brandCount }}
                                </div>

                            </div>

                            <div class="col-auto">
                                <i class="fa fa-tags fa-2x icon-danger"></i>
                            </div>

                        </div>

                    </div>
                </div>

            </a>
        </div>


        {{-- Total Orders --}}
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="{{ route('admin.orders.index') }}"
               class="dashboard-link">

                <div class="card shadow h-100 dashboard-card border-left-info">
                    <div class="card-body">

                        <div class="row align-items-center">

                            <div class="col mr-2">

                                <div class="text-xs font-weight-bold text-uppercase mb-2 text-info-custom">
                                    Total Orders
                                </div>

                                <div class="h4 mb-0 font-weight-bold text-dark">
                                    {{ $orderCount }}
                                </div>

                            </div>

                            <div class="col-auto">
                                <i class="fa fa-shopping-cart fa-2x icon-info"></i>
                            </div>

                        </div>

                    </div>
                </div>

            </a>
        </div>


        {{-- Total Revenue --}}
        <div class="col-xl-3 col-md-6 mb-4">

            <div class="card shadow h-100 dashboard-card border-left-success">
                <div class="card-body">

                    <div class="row align-items-center">

                        <div class="col mr-2">

                            <div class="text-xs font-weight-bold text-uppercase mb-2 text-success-custom">
                                Total Revenue
                            </div>

                            <div class="h4 mb-0 font-weight-bold text-dark">
                                ₹{{ number_format($totalRevenue, 2) }}
                            </div>

                        </div>

                        <div class="col-auto">
                            <i class="fa fa-money fa-2x icon-success"></i>
                        </div>

                    </div>

                </div>
            </div>

        </div>

    </div>

</div>

@include('admin.includes.footer')