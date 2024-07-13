@extends('auth.layout')

@section('content')
    <style>
        body,
        html {
            height: 100%;
            margin: 0;
            background-color: #f8f9fa;
        }

        .full-page-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
        }

        .auth-form-light {
            background: white;
            border-radius: 10px;
            padding: 40px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .brand-logo img {
            width: 40px;
            /* Adjusted size */
        }

        .brand-logo h5 {
            margin-left: 10px;
            font-size: 1.25rem;
        }

        .auth-form-btn {
            font-size: 1rem;
        }

        .form-group label {
            font-weight: 600;
        }

        .text-primary {
            color: #007bff !important;
        }
    </style>

    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="mb-4">
                                <div class="brand-logo d-flex align-items-center">
                                    <img src="/dashboard/images/logointan.png" alt="logo" style="width:50px;">
                                    <h5 class="ml-3 text-primary">PT Intan Pariwara Palembang</h5>
                                </div>
                                <h4 class="mt-3">Login</h4>
                            </div>
                            <h6 class="font-weight-light mb-4">Log in to continue.</h6>
                            <form class="pt-3" action="{{ route('login.post') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control form-control-lg"
                                        id="exampleInputEmail1" placeholder="Username" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control form-control-lg"
                                        id="exampleInputPassword1" placeholder="Password" required>
                                </div>
                                <div class="mt-3">
                                    <button type="submit"
                                        class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
                                        LOG IN
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
@endsection
