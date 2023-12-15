@extends('layouts.app')

@section('title', 'Adaugă Eveniment Nou')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Adaugă Eveniment Nou</div>
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

            {{ Form::open(['route' => 'events.store', 'method' => 'POST']) }}

            <div class="form-group">
                {{ Form::label('name', 'Nume') }}
                {{ Form::text('name', old('name'), ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::label('description', 'Descriere') }}
                {{ Form::textarea('description', old('description'), ['class' => 'form-control', 'rows' => 3]) }}
            </div>

            <div class="form-group">
                {{ Form::label('date', 'Data') }}
                {{ Form::date('date', old('date'), ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::label('location', 'Locație') }}
                {{ Form::text('location', old('location'), ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::label('photo', 'Fotografie') }}
                {{ Form::file('photo', ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::label('SponsorId', 'Sponsor') }}
                {{ Form::select('SponsorId', $sponsors, null, ['class' => 'form-control', 'placeholder' => 'Select Sponsor']) }}
            </div>

            <div class="form-group">
                {{ Form::label('ArtistId', 'Artist') }}
                {{ Form::select('ArtistId', $artists, null, ['class' => 'form-control', 'placeholder' => 'Select Artist']) }}
            </div>

            <div class="form-group">
                {{ Form::label('AgendaId', 'Agenda') }}
                {{ Form::select('AgendaId', $agendas, null, ['class' => 'form-control', 'placeholder' => 'Select Agenda']) }}
            </div>
            
            <div class="form-group">
                {{ Form::submit('Adaugă Eveniment', ['class' => 'btn btn-info']) }}
                <a href="{{ route('events.index') }}" class="btn btn-default">Cancel</a>
            </div>

            {{ Form::close() }}

        </div>
    </div>
@endsection
