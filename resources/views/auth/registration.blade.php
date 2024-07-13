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
            background-image: url('https://source.unsplash.com/1600x900/?nature,forest');
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

        .card {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            z-index: 2;
            position: relative;
        }

        .card-header {
            background-color: #007bff;
            color: white;
            font-weight: bold;
            text-align: center;
            border-radius: 10px 10px 0 0;
        }

        .btn-primary {
            background: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background: #0056b3;
        }

        .form-control {
            border-radius: 5px;
        }

        .text-danger {
            font-size: 0.875rem;
        }

        .checkbox label {
            color: #6c757d;
        }
    </style>

    <div class="container-scroller d-flex align-items-center justify-content-center">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-6 mx-auto">
                        <div class="card">
                            <div class="card-header">Register</div>
                            <div class="card-body">
                                <form action="{{ route('register.post') }}" method="POST">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                                        <div class="col-md-6">
                                            <input type="text" id="name" class="form-control" name="name"
                                                required autofocus>
                                            @if ($errors->has('name'))
                                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail
                                            Address</label>
                                        <div class="col-md-6">
                                            <input type="text" id="email_address" class="form-control" name="email"
                                                required autofocus>
                                            @if ($errors->has('email'))
                                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                        <div class="col-md-6">
                                            <input type="password" id="password" class="form-control" name="password"
                                                required>
                                            @if ($errors->has('password'))
                                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-6 offset-md-4">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="remember"> Remember Me
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary btn-block">
                                            Register
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
