@extends('layout')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h2>Create New Role</h2>
                        <a class="btn btn-primary" href="{{ route('roles.index') }}">
                            <i class="fas fa-arrow-left mr-1"></i> Back
                        </a>
                    </div>
                    <div class="card-body">
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

                        {!! Form::open(['route' => 'roles.store', 'method' => 'POST']) !!}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <strong>Name:</strong>
                                    {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Permissions:</strong>
                                    <br>
                                    @foreach ($permissions->chunk(ceil($permissions->count() / 2)) as $chunk)
                                        @foreach ($chunk as $value)
                                            <label>
                                                {{ Form::checkbox('permission[]', $value->id, false, ['class' => 'name']) }}
                                                {{ $value->name }}
                                            </label><br>
                                        @endforeach
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>&nbsp;</strong>
                                    <br>
                                    @foreach ($permissions->chunk(ceil($permissions->count() / 2)) as $chunk)
                                        @foreach ($chunk as $value)
                                            <label>
                                                {{ Form::checkbox('permission[]', $value->id, false, ['class' => 'name']) }}
                                                {{ $value->name }}
                                            </label><br>
                                        @endforeach
                                    @endforeach
                                </div>
                            </div>
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
