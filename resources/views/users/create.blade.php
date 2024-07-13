@extends('layout')

@section('content')
    <div class="row mt-4">
        <div class="col-lg-12 d-flex justify-content-between align-items-center">
            <h2 class="text-primary"><i class="fas fa-user mr-2"></i> Add New User</h2>
            <a class="btn btn-primary" href="{{ route('users.index') }}">
                <i class="fas fa-arrow-left mr-1"></i> Back
            </a>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger mt-3">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row mt-3 justify-content-center">
        <div class="col-lg-8">
            <div class="card mx-auto shadow-sm rounded">
                <div class="card-body">
                    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name">Nama:</label>
                                <input type="text" id="name" name="name" class="form-control" placeholder="Nama"
                                    required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="email">Email:</label>
                                <input type="email" id="email" name="email" class="form-control"
                                    placeholder="email@gmail.com" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="password">Password:</label>
                                <input type="password" id="password" name="password" class="form-control"
                                    placeholder="Password" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="confirm-password">Confirm Password:</label>
                                <input type="password" id="confirm-password" name="confirm-password" class="form-control"
                                    placeholder="Ulangi Password" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="roles">Role:</label>
                            {!! Form::select('roles[]', $roles, [], ['class' => 'form-control', 'multiple', 'id' => 'roles']) !!}
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
