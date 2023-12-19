@extends('layouts.app')

@section('title', 'Vizualizare Eveniment')


@section('content')
    <div class="panel panel-default" >
        <div class="panel-heading" >Vizualizare Eveniment</div>
        <div class="panel-body">
            <div class="pull-right">
                <a class="btn btn-default" href="{{ route('events.index') }}">Înapoi</a>
            </div>

            <div class="form-group">
                <strong style="color: #560f88;">Nume: </strong> {{ $event->name }}
            </div>

            <div class="form-group">
                <strong style="color: #560f88;">Descriere: </strong> {{ $event->description }}
            </div>

            <div class="form-group">
                <strong style="color: #560f88;">Data: </strong> {{ $event->date }}
            </div>

            <div class="form-group">
                <strong style="color: #560f88;">Locație: </strong> {{ $event->location }}
            </div>

            <div class="form-group">
                <strong style="color: #560f88;">Fotografie: </strong>
                @if($event->photo)
                    <img src="{{ asset('images/' . $event->photo) }}" class="card-img-top" alt="Photo">
                @else
                    Nicio fotografie disponibilă
                @endif
            </div>

            <div class="form-group">
                <strong style="color: #560f88;">Agenda: </strong>
                @foreach($event->agendas as $agenda)
                    <p>{{ $agenda->startTime }} - {{ $agenda->finishTime }}: {{ $agenda->artist->name }}</p>
                @endforeach
            </div>

            <div class="form-group">
                <strong style="color: #560f88;">Sponsori: </strong>
                @foreach($event->sponsors as $sponsor)
                    <p>{{ $sponsor->name }}</p>
                @endforeach
            </div>
        </div>
    </div>
@endsection
