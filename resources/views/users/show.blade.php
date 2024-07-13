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
                            <label for="name" class="form-label"><strong>Name :</strong></label>
                            <input type="text"  disabled value="{{ $user->name }}" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="email" class="form-label"><strong>Email :</strong></label>
                            <input type="text"  disabled value="{{ $user->email }}" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="Role" class="form-label"><strong>Role :</strong></label>
                            @if (!empty($user->getRoleNames()))
                                @foreach ($user->getRoleNames() as $v)
                                <input type="text"  disabled value="{{ $v }}" class="form-control" />

                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
