@extends('layout')

@section('content')
    <div class="row mt-3 mb-4 align-items-center">
        <div class="col-lg-6">
            <h2 class="text-primary"><i class="fas fa-user mr-2"></i> Show User</h2>
        </div>
        <div class="col-lg-6 text-right">
            <a class="btn btn-primary" href="{{ route('users.index') }}">
                <i class="fas fa-arrow-left mr-1"></i>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="container mt-3 mb-3 p-4 shadow-sm rounded">

                <div class="card shadow-sm mt-3">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0">Detail User</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <strong>Name:</strong>
                            <p>{{ $user->name }}</p>
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            <p>{{ $user->email }}</p>
                        </div>
                        <div class="form-group">
                            <strong>Roles:</strong>
                            @if (!empty($user->getRoleNames()))
                                @foreach ($user->getRoleNames() as $v)
                                    <span class="badge badge-success">{{ $v }}</span>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
