@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Euphoria Events') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h3>Upcoming Events</h3>

                    @forelse($events as $events)
                        <div class="event card mb-3">
                        <img src="{{ asset($events->photo) }}" class="card-img-top" alt="Event Photo">
                            <div class="card-body">
                                <h4 class="card-title">{{ $events->name }}</h4>
                                <p class="card-text"><strong>Date:</strong> {{ $events->date }}</p>
                                <p class="card-text"><strong>Location:</strong> {{ $events->location }}</p>
                                <p class="card-text"><strong>Description:</strong> {{ $events->description }}</p>
                                <!-- Add more details as needed -->

                                {{-- You can add a link to view the event details --}}
                                <a href="{{ route('events.show', $events->id) }}" class="btn btn-primary">View Details</a>
                            </div>
                        </div>
                    @empty
                        <p>No upcoming events</p>
                    @endforelse
                </div>
                <div> <a href="{{URL::to('events') }}"> Afiseaza evenimente</a> </div> 
            </div>
        </div>
    </div>
</div>
@endsection
