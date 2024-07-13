@extends('layout')

@section('content')
    <div class="row mt-4">
        <div class="col-lg-12 d-flex justify-content-between align-items-center">
            <h2 class="text-primary"><i class="fas fa-user mr-2"></i> Manage User</h2>
            <a class="btn btn-primary" href="{{ route('users.create') }}"><i class="fas fa-plus mr-1"></i>Create New
                User</a>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success mt-3">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="row mt-4">
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Data User</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover data-table">
                        <thead class="table-primary">
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Roles</th>
                                <th width="280px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $user)
                                <tr style="background-color: #f9f9f9;">
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if (!empty($user->getRoleNames()))
                                            @foreach ($user->getRoleNames() as $v)
                                                <span class="badge bg-primary text-white">{{ $v }}</span>
                                            @endforeach
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <a class="btn btn-info btn-sm mr-1" href="{{ route('users.show', $user->id) }}">
                                                <i class="fas fa-eye"></i> Show
                                            </a>
                                            <a class="btn btn-primary btn-sm mr-1"
                                                href="{{ route('users.edit', $user->id) }}">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure you want to delete this user?')">
                                                    <i class="fas fa-trash-alt"></i> Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{-- Pagination removed as requested --}}
                </div>
            </div>
        </div>
    </div>
@endsection
