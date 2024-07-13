@extends('auth.layout')

@section('content')
    <style>
        body,
        html {
            height: 100%;
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
        }

        .container-scroller {
            background-image: url('https://source.unsplash.com/1600x900/?nature,water');
            background-size: cover;
            background-position: center;
            position: relative;
        }

        .container-scroller::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            /* Black overlay */
            z-index: 1;
        }

        .auth-form-light {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            z-index: 2;
            position: relative;
        }

        .brand-logo img {
            max-width: 150px;
        }

        .btn-primary {
            background: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background: #0056b3;
        }

        .auth-form-btn {
            transition: background 0.3s ease;
        }

        .auth-form-btn:hover {
            background: #0056b3;
        }

        .form-control-lg {
            height: calc(2.875rem + 2px);
            padding: 0.875rem 1.75rem;
            font-size: 1.25rem;
        }

        .form-check-label {
            color: #6c757d;
        }

        .text-danger {
            font-size: 0.875rem;
        }
    </style>

    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo text-center">
                                <img src="../../images/logo.svg" alt="logo">
                            </div>
                            <h4 class="text-center">Hello! let's get started</h4>
                            <h6 class="font-weight-light text-center mb-4">Sign in to continue.</h6>
                            <form action="{{ route('login.post') }}" method="POST" class="pt-3">
                                @csrf

                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-lg"
                                        id="email_address" placeholder="Email">
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <input type="password" name="password" class="form-control form-control-lg"
                                        id="password" placeholder="Password">
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" name="remember" class="form-check-input"> Remember Me
                                        </label>
                                    </div>
                                </div>

                                <div class="mt-3">
                                    <button type="submit"
                                        class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
                                        Login
                                    </button>
                                </div>
                                <div class="text-center mt-4 font-weight-light">
                                    Don't have an account?
                                    <a href="{{ route('register') }}" class="text-primary">Create</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
