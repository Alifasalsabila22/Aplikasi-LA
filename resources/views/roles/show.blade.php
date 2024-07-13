@extends('layout')

<style>
    .permission-container {
        height: 200px;
        overflow-y: scroll;
    }
</style>

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
                            <div class="col-md-12">
                                <label for="name" class="form-label"><strong>Name :</strong></label>
                                <input type="text" disabled value="{{ $role->name }}" class="form-control" />
                            </div>


                            <div class="col-md-12 mt-3">
                                <label for="permision" class="form-label"><strong>Permision :</strong></label>
                                <div class="permission-container">
                                    @if (!empty($rolePermissions))
                                        @foreach ($rolePermissions as $permission)
                                            <input type="text" disabled value="{{ $permission->name }}"
                                                class="form-control mb-2" />
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>



                    </div>
                    <div class="card-footer">
                        <a class="btn btn-primary" href="{{ route('roles.index') }}">
                            <i class="bi bi-arrow-left"></i> Back
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
