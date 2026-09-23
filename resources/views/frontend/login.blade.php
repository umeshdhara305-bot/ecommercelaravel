@extends('frontend.layout')

@section('content')

<section id="form"><!--form-->
    <div class="container">
        <div class="row">

            {{-- Validation / Success Messages --}}
            <div class="col-sm-10 col-sm-offset-1">

                @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

            </div>


            {{-- LOGIN --}}
            <div class="col-sm-4 col-sm-offset-1">

                <div class="login-form">

                    <h2>Login to your account</h2>

                    <form action="{{ route('login.submit') }}" method="POST">

                        @csrf

                        <input
                            type="email"
                            name="email"
                            placeholder="Email Address"
                            value="{{ old('email') }}"
                        />

                        <input
                            type="password"
                            name="password"
                            placeholder="Password"
                        />

                        <span>
                            <input
                                type="checkbox"
                                name="remember"
                                class="checkbox"
                            >
                            Keep me signed in
                        </span>

                        <button type="submit" class="btn btn-default">
                            Login
                        </button>

                    </form>

                </div><!--/login form-->

            </div>


            {{-- OR --}}
            <div class="col-sm-1">
                <h2 class="or">OR</h2>
            </div>


            {{-- REGISTER --}}
            <div class="col-sm-4">

                <div class="signup-form">

                    <h2>New User Signup!</h2>

                    <form action="{{ route('register.submit') }}" method="POST">

                        @csrf

                        <input
                            type="text"
                            name="name"
                            placeholder="Name"
                            value="{{ old('name') }}"
                        />

                        <input
                            type="email"
                            name="email"
                            placeholder="Email Address"
                            value="{{ old('email') }}"
                        />

                        <input
                            type="password"
                            name="password"
                            placeholder="Password"
                        />

                        <input
                            type="password"
                            name="password_confirmation"
                            placeholder="Confirm Password"
                        />

                        <button type="submit" class="btn btn-default">
                            Signup
                        </button>

                    </form>

                </div><!--/sign up form-->

            </div>

        </div>
    </div>
</section><!--/form-->

@endsection