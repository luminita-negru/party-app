@extends('layouts.master')

@section('title', 'Modificare Informații Eveniment')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading"> Modificare Informații Eveniment</div>
        <div class="panel-body">

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Eroare:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {!! Form::model($event, ['method' => 'PATCH', 'route' => ['events.update', $event->id]]) !!}
            
            <div class="form-group">
                {{ Form::label('name', 'Nume') }}
                {{ Form::text('name', $event->name, ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::label('description', 'Descriere') }}
                {{ Form::textarea('description', $event->description, ['class' => 'form-control', 'rows' => 3]) }}
            </div>

            <div class="form-group">
                {{ Form::label('date', 'Data') }}
                {{ Form::date('date', $event->date, ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::label('location', 'Locație') }}
                {{ Form::text('location', $event->location, ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::label('photo', 'Fotografie') }}
                {{ Form::file('photo', ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::submit('Salvare Modificări', ['class' => 'btn btn-info']) }}
                <a href="{{ route('events.index') }}" class="btn btn-default">Cancel</a>
            </div>

            {!! Form::close() !!}
            
        </div>
    </div>
@endsection
