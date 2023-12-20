<!-- resources/views/carts/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Shopping Cart</h1>

        @if(count($cartItems) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Event</th>
                        <th>Date</th>
                        <th>Location</th>
                        <th>Description</th>
                        <th>Number of Tickets</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cartItems as $cartItem)
                        <tr>
                            <td>
                                @if($cartItem->event)
                                    {{ $cartItem->event->name }}
                                @else
                                    N/A
                                @endif
                            </td>
                            <td>
                                @if($cartItem->event)
                                    {{ $cartItem->event->date }}
                                @else
                                    N/A
                                @endif
                            </td>
                            <td>
                                @if($cartItem->event)
                                    {{ $cartItem->event->location }}
                                @else
                                    N/A
                                @endif
                            </td>
                            <td>
                                @if($cartItem->event)
                                    {{ $cartItem->event->description }}
                                @else
                                    N/A
                                @endif
                            </td>
                            
                            <td>
                            <form action="{{ route('carts.update', $cartItem->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <input type="number" name="nr_tickets" value="{{ $cartItem->nr_tickets }}" min="1">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </td>
                            <td>
                                <form action="{{ route('carts.remove', $cartItem->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Your cart is empty.</p>
        @endif
    </div>
@endsection
