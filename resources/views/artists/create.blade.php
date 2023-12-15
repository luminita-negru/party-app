@extends('layouts.app')

@section('title', 'Adaugă Artist Nou')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Adaugă Artist Nou</div>
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

            {{ Form::open(['route' => 'artists.store', 'method' => 'POST']) }}

            <div class="form-group">
                {{ Form::label('name', 'Name') }}
                {{ Form::text('name', old('name'), ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::label('genre', 'Genre') }}
                {{ Form::textarea('genre', old('genre'), ['class' => 'form-control', 'rows' => 3]) }}
            </div>

            {{ Form::close() }}

        </div>
    </div>
@endsection