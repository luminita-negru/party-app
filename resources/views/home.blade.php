@extends('layouts.app')

@section('content')
<div class="container" style="background-color: #2E0854; color: #8A2BE2; padding: 20px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2 style="margin: 0;">Euphoria Events</h2>
                    <nav>
                        <ul style="list-style: none; display: flex; margin: 0; padding: 0; justify-content: space-between;">
                            <li><a href="/events" style="text-decoration: none; color: #8A2BE2;">Events</a></li>
                            <li><a href="{/contact}" style="text-decoration: none; color: #8A2BE2;">Contact</a></li>
                            <li><a href="{/cart}" style="text-decoration: none; color: #8A2BE2;">Cart</a></li>
                        </ul>
                    </nav>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h3>Upcoming Events</h3>

                    @forelse($events as $event)
                        <div class="event card mb-3">
                            <img src="{{ asset('images/' . $event->photo) }}" class="card-img-top" alt="Event Photo">
                            <div class="card-body">
                                <h4 class="card-title">{{ $event->name }}</h4>
                                <p class="card-text"><strong>Date:</strong> {{ $event->date }}</p>
                                <p class="card-text"><strong>Location:</strong> {{ $event->location }}</p>
                                <p class="card-text"><strong>Description:</strong> {{ $event->description }}</p>
                                <p class="card-text"><strong>Price:</strong> {{ $event->price }}</p>
                                <!-- Add more details as needed -->

                                {{-- Add to Cart Form --}}
                                <form action="{{ route('carts.add', $event->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    <label for="nr_tickets">Tickets:</label>
                                    <input type="number" name="nr_tickets" value="1" min="1">
                                    <button type="submit" class="btn btn-success">Add to Cart</button>
                                </form>

                                {{-- View Details Link --}}
                                <a href="{{ route('event.details', $event->id) }}" class="btn btn-primary">View Details</a>
                            </div>
                        </div>
                    @empty
                        <p>No upcoming events</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
