@extends('layouts.master')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            View sponsor
        </div>
        <div class="panel-body">
            <div class="pull-right">
                <a class="btn btn-default" href="{{ route('sponsors.index') }}">Back</a>
            </div>
            <div class="form-group">
                <strong>Sponsor: </strong> {{ $sponsor->name }}
            </div>
            <div class="form-group">
                <strong>Logo: </strong> <img src="{{ asset($sponsor->logo) }}" alt="Sponsor Logo">
            </div>
        </div>
    </div>
@endsection
