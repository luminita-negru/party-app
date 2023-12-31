@extends('layouts.master')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            View artist
        </div>
        <div class="panel-body">
            <div class="pull-right">
                <a class="btn btn-default" href="{{ route('artists.index') }}">Back</a>
            </div>
            <div class="form-group">
                <strong>Name: </strong> {{ $artist->name }}
            </div>
            <div class="form-group">
                <strong>Genre: </strong> {{ $artist->genre }}
            </div>
        </div>
    </div>
@endsection