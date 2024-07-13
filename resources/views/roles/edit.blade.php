@extends('layout')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h2>Edit Roles</h2>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-lg-6">
                                <!-- Left side content -->
                            </div>
                            <div class="col-lg-6 text-right"> <!-- Right side for the button -->
                                <a class="btn btn-primary" href="{{ route('roles.index') }}">
                                    <i class="fas fa-arrow-left mr-1"></i> Back
                                </a>
                            </div>
                        </div>

                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {!! Form::model($role, ['method' => 'PATCH', 'route' => ['roles.update', $role->id]]) !!}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <strong>Name:</strong>
                                    {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <strong>Permissions:</strong>
                                    <br>
                                    @php
                                        $half = ceil($permission->count() / 2); // Divide permissions into two columns
                                        $permissions = $permission->all();
                                    @endphp
                                    <div class="row">
                                        <div class="col-md-6">
                                            @foreach ($permissions as $key => $value)
                                                @if ($key < $half)
                                                    <label>
                                                        {{ Form::checkbox('permission[]', $value->name, in_array($value->id, $rolePermissions) ? true : false, ['class' => 'name']) }}
                                                        {{ $value->name }}
                                                    </label><br>
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="col-md-6">
                                            @foreach ($permissions as $key => $value)
                                                @if ($key >= $half)
                                                    <label>
                                                        {{ Form::checkbox('permission[]', $value->name, in_array($value->id, $rolePermissions) ? true : false, ['class' => 'name']) }}
                                                        {{ $value->name }}
                                                    </label><br>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
