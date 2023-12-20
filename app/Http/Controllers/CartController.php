<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Cart;

class CartController extends Controller
{
    //
    public function index()
    {
        // Fetch cart items for the authenticated user
        $user = auth()->user();
        $cartItems = Cart::where('UserId', $user->id)->with('event')->get();

        return view('carts.index', compact('cartItems'));
    }

    public function add(Event $event, Request $request)
    {
        $user = auth()->user();

        // Create a new cart item
        Cart::create([
            'UserId' => $user->id,
            'EventId' => $event->id,
            'nr_tickets' => $request->input('nr_tickets'),
        ]);

        return redirect()->route('carts.index')->with('success', 'Event added to cart.');
    }

    public function update(Cart $cart, Request $request)
    {
        $cart->update([
            'nr_tickets' => $request->input('nr_tickets'),
        ]);
    
        return redirect()->route('carts.index')->with('success', 'Quantity updated.');
    }

    public function remove(Cart $cart)
    {
        $cart->delete();

        return redirect()->route('carts.index')->with('success', 'Event removed from cart.');
    }
}
