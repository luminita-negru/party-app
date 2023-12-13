@extends('layouts.master')

@section('title', 'Vizualizare Eveniment')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Vizualizare Eveniment</div>
        <div class="panel-body">
            <div class="pull-right">
                <a class="btn btn-default" href="{{ route('events.index') }}">Înapoi</a>
            </div>

            <div class="form-group">
                <strong>Nume: </strong> {{ $event->name }}
            </div>

            <div class="form-group">
                <strong>Descriere: </strong> {{ $event->description }}
            </div>

            <div class="form-group">
                <strong>Data: </strong> {{ $event->date }}
            </div>

            <div class="form-group">
                <strong>Locație: </strong> {{ $event->location }}
            </div>

            <div class="form-group">
                <strong>Fotografie: </strong>
                @if($event->photo)
                    <img src="{{ asset('path-to-your-photo-directory/' . $event->photo) }}" alt="Photo">
                @else
                    Nicio fotografie disponibilă
                @endif
            </div>
        </div>
    </div>
@endsection
