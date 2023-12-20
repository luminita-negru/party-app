@extends('layouts.app')

@section('title', 'Event Details')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center bg-purple text-white">
                        <h2 class="mb-0">Event Details</h2>
                        <div class="nav">
                            <a href="{{ route('events.index') }}" class="btn btn-light">Back to Events</a>
                            <a href="{{ route('contact') }}" class="btn btn-light">Contact</a>
                            <a href="{{ route('cart') }}" class="btn btn-light">Cart</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="section">
                            <h3 class="section-title text-purple">Event Information</h3>
                            <div class="form-group">
                                <strong class="text-purple">Name:</strong> {{ $event->name }}
                            </div>

                            <div class="form-group">
                                <strong class="text-purple">Description:</strong> {{ $event->description }}
                            </div>

                            <div class="form-group">
                                <strong class="text-purple">Date:</strong> {{ $event->date }}
                            </div>

                            <div class="form-group">
                                <strong class="text-purple">Location:</strong> {{ $event->location }}
                            </div>
                        </div>

                        <div class="section">
                            <h3 class="section-title text-purple">Event Media</h3>
                            <div class="form-group">
                                <strong class="text-purple">Photo:</strong>
                                @if($event->photo)
                                    <img src="{{ asset('images/' . $event->photo) }}" class="card-img-top" alt="Photo" style="max-width: 100%;">
                                @else
                                    No photo available
                                @endif
                            </div>
                        </div>

                        <div class="section">
                            <h3 class="section-title text-purple">Agenda</h3>
                            <div class="form-group">
                                <strong class="text-purple">Agenda:</strong>
                                @foreach($event->agendas as $agenda)
                                    <p>{{ $agenda->startTime }} - {{ $agenda->finishTime }}: {{ $agenda->artist->name }}</p>
                                @endforeach
                            </div>
                        </div>

                        <div class="section">
                            <h3 class="section-title text-purple">Sponsors</h3>
                            <div class="form-group">
                                <strong class="text-purple">Sponsors:</strong>
                                @foreach($event->sponsors as $sponsor)
                                    <p>{{ $sponsor->name }}</p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
