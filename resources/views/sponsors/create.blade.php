@extends('layouts.master')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Add a new sponsor</div>
        <div class="panel-body">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Errors:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{ Form::open(array('route' => 'sponsors.store', 'method' => 'POST')) }}
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
            </div>
            <div class="form-group">
                <label for="genre">Logo</label>
                <input type="text" name="logo" class="form-control" value="{{ old('logo') }}">
            </div>
            <div class="form-group">
                <input type="submit" value="Add new sponsor" class="btn btn-info">
                <a href="{{ route('sponsors.index') }}" class="btn btn-default">Cancel</a>
            </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection
