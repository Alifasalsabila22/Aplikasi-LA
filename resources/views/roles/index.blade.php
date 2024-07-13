@extends('layout')

@section('content')
    <div class="row mt-4">
        <div class="col-lg-12 d-flex justify-content-between align-items-center">
            <h2 class="text-primary">Manage Role</h2>
            <a class="btn btn-primary" href="{{ route('roles.create') }}"><i class="fas fa-plus mr-1"></i>Create New Role</a>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success mt-3">
            {{ $message }}
        </div>
    @endif

    <div class="row mt-4">
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Data Roles</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="table-primary">
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $key => $role)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a class="btn btn-info btn-sm mr-1"
                                                    href="{{ route('roles.show', $role->id) }}"><i
                                                        class="fas fa-eye"></i></a>
                                                @can('role-edit')
                                                    <a class="btn btn-primary btn-sm mr-1"
                                                        href="{{ route('roles.edit', $role->id) }}"><i
                                                            class="fas fa-edit"></i></a>
                                                @endcan
                                                @can('role-delete')
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id], 'style' => 'display:inline']) !!}
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Are you sure you want to delete this role?')">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                    {!! Form::close() !!}
                                                @endcan
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
