@include('admin.includes.header')
@include('admin.includes.sidebar')

<div class="main-content">

    <section class="section">
        <div class="section-header">
            <h1>Customers</h1>
        </div>

        <div class="section-body">

            {{-- Customer Statistics --}}
            <div class="row mb-4">

                <div class="col-lg-4 col-md-6">
                    <div class="card card-statistic-1 shadow-sm">
                        <div class="card-icon bg-primary">
                            <i class="fas fa-users"></i>
                        </div>

                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Customers</h4>
                            </div>

                            <div class="card-body">
                                {{ $customers->count() }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8 col-md-6">
                    <div class="card shadow-sm">
                        <div class="card-body d-flex align-items-center justify-content-between">

                            <div>
                                <h6 class="mb-1">Customer Management</h6>
                                <p class="text-muted mb-0">
                                    View and manage all registered customers.
                                </p>
                            </div>

                            <i class="fas fa-user-friends fa-3x text-primary"></i>

                        </div>
                    </div>
                </div>

            </div>


            {{-- Customer Table --}}
            <div class="card shadow-sm">

                <div class="card-header">
                    <h4>
                        <i class="fas fa-users mr-2"></i>
                        Customer List
                    </h4>
                </div>

                <div class="card-body p-0">

                    <div class="table-responsive">

                        <table class="table table-striped table-hover mb-0">

                            <thead class="bg-light">
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Customer</th>
                                    <th>Email Address</th>
                                    <th>Registered Date</th>
                                    <th class="text-center">Status</th>
                                </tr>
                            </thead>

                            <tbody>

                                @forelse($customers as $customer)

                                    <tr>

                                        {{-- Serial Number --}}
                                        <td class="text-center">
                                            {{ $loop->iteration }}
                                        </td>


                                        {{-- Customer Name --}}
                                        <td>

                                            <div class="d-flex align-items-center">

                                                <div class="customer-avatar mr-3">
                                                    {{ strtoupper(substr($customer->name, 0, 1)) }}
                                                </div>

                                                <div>
                                                    <strong>
                                                        {{ $customer->name }}
                                                    </strong>

                                                    <br>

                                                    <small class="text-muted">
                                                        Customer ID: #{{ $customer->id }}
                                                    </small>
                                                </div>

                                            </div>

                                        </td>


                                        {{-- Email --}}
                                        <td>
                                            <i class="fas fa-envelope text-muted mr-1"></i>
                                            {{ $customer->email }}
                                        </td>


                                        {{-- Registration Date --}}
                                        <td>

                                            <strong>
                                                {{ $customer->created_at->format('d M Y') }}
                                            </strong>

                                            <br>

                                            <small class="text-muted">
                                                {{ $customer->created_at->format('h:i A') }}
                                            </small>

                                        </td>


                                        {{-- Status --}}
                                        <td class="text-center">

                                            <span class="badge badge-success px-3 py-2">
                                                Active
                                            </span>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>
                                        <td colspan="5" class="text-center py-5">

                                            <i class="fas fa-users fa-3x text-muted mb-3"></i>

                                            <h5>No Customers Found</h5>

                                            <p class="text-muted">
                                                No customers have registered yet.
                                            </p>

                                        </td>
                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>
    </section>

</div>


<style>

    /* Customer avatar */
    .customer-avatar {
        width: 42px;
        height: 42px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #6777ef;
        color: white;
        font-weight: bold;
        font-size: 17px;
    }

    /* Table */
    .table thead th {
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        padding: 16px;
    }

    .table tbody td {
        vertical-align: middle;
        padding: 15px;
    }

    .table tbody tr {
        transition: 0.2s;
    }

    .table tbody tr:hover {
        transform: scale(1.002);
    }

    /* Customer card */
    .card-statistic-1 {
        min-height: 110px;
    }

</style>

@include('admin.includes.footer')