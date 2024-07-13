@extends('layout')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h2>Show Role</h2>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <strong>Name:</strong>
                            </div>
                            <div class="col-md-5">
                                {{ $role->name }}
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-3">
                                <strong>Permissions:</strong>
                            </div>
                            <div class="col-md-5">
                                @if (!empty($rolePermissions))
                                    @foreach ($rolePermissions as $permission)
                                        <span class="badge badge-success">{{ $permission->name }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-info" href="{{ route('roles.index') }}">
                            <i class="bi bi-arrow-left"></i> Back
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
