<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no"
        name="viewport">

    <title>Admin Login</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/app.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bundles/bootstrap-social/bootstrap-social.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.ico') }}">
</head>

<body>

    <div class="loader"></div>

    <div id="app">

        <section class="section">

            <div class="container mt-5">

                <div class="row">

                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">

                        <div class="card card-primary">

                            <div class="card-header">
                                <h4>Admin Login</h4>
                            </div>

                            <div class="card-body">

                                {{-- Login Error --}}
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul class="mb-0">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif


                                {{-- Admin Login Form --}}
                                <form method="POST"
                                      action="{{ route('admin.login.submit') }}"
                                      class="needs-validation"
                                      novalidate>

                                    @csrf


                                    {{-- Email --}}
                                    <div class="form-group">

                                        <label for="email">Email</label>

                                        <input
                                            id="email"
                                            type="email"
                                            class="form-control"
                                            name="email"
                                            value="{{ old('email') }}"
                                            tabindex="1"
                                            required
                                            autofocus
                                        >

                                        <div class="invalid-feedback">
                                            Please fill in your email
                                        </div>

                                    </div>


                                    {{-- Password --}}
                                    <div class="form-group">

                                        <label for="password" class="control-label">
                                            Password
                                        </label>

                                        <input
                                            id="password"
                                            type="password"
                                            class="form-control"
                                            name="password"
                                            tabindex="2"
                                            required
                                        >

                                        <div class="invalid-feedback">
                                            Please fill in your password
                                        </div>

                                    </div>


                                    {{-- Login Button --}}
                                    <div class="form-group">

                                        <button
                                            type="submit"
                                            class="btn btn-primary btn-lg btn-block"
                                            tabindex="3">

                                            <i class="fas fa-sign-in-alt"></i>
                                            Login

                                        </button>

                                    </div>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>

    </div>


    <!-- General JS -->
    <script src="{{ asset('assets/js/app.min.js') }}"></script>

    <!-- Template JS -->
    <script src="{{ asset('assets/js/scripts.js') }}"></script>

    <!-- Custom JS -->
    <script src="{{ asset('assets/js/custom.js') }}"></script>

</body>
</html>