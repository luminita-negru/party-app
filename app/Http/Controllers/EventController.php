<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event; 
use App\Http\Requests;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $events = Event::orderBy('name', 'ASC')->paginate(5);
        $value = ($request->input('page', 1) - 1) * 5;
        return view('events.list', compact('events'))->with('i', $value);
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'date' => 'required',
            'location' => 'required',
            'description' => 'required',
            'photo' => 'required', 
        ]);

        // Crează un nou eveniment
        Event::create($request->all());

        return redirect()->route('events.index')->with('success', 'Your event added successfully!');
    }

    public function show($id)
    {
        $event = Event::find($id);
        return view('events.show', compact('event'));
    }

    public function edit($id)
    {
        $event = Event::find($id);
        return view('events.edit', compact('event'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'date' => 'required',
            'location' => 'required',
            'description' => 'required',
            'photo' => 'required',
        ]);

        Event::find($id)->update($request->all());

        return redirect()->route('events.index')->with('success', 'Event updated successfully');
    }

    public function destroy($id)
    {
        Event::find($id)->delete();
        return redirect()->route('events.index')->with('success', 'Event removed successfully');
    }
}
