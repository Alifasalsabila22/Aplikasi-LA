@extends('layout')

@section('content')
    <div class="row mt-4">
        <div class="col-lg-12 d-flex justify-content-between align-items-center">
            <h2 class="text-primary"><i class="fas fa-edit mr-2"></i> Edit User</h2>
            <a class="btn btn-primary" href="{{ route('users.index') }}">
                <i class="fas fa-arrow-left mr-1"></i> Back
            </a>
        </div>
    </div>

    @if (count($errors) > 0)
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
            <div class="card shadow-sm rounded">
                <div class="card-body">
                    {!! Form::model($user, ['method' => 'PATCH', 'route' => ['users.update', $user->id]]) !!}

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Name:</label>
                                {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email:</label>
                                {!! Form::text('email', null, ['placeholder' => 'Email', 'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password">Password:</label>
                        {!! Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        <label for="confirm-password">Confirm Password:</label>
                        {!! Form::password('confirm-password', ['placeholder' => 'Confirm Password', 'class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        <label for="roles">Role:</label>
                        {!! Form::select('roles[]', $roles, $userRole, ['class' => 'form-control', 'multiple']) !!}
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection
