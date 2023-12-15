<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Sponsor;
use App\Models\Artist;
use App\Models\Agenda;
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
        $sponsors = Sponsor::pluck('name', 'SponsorId');
        $artists = Artist::pluck('name', 'ArtistId');
        $agendas = Agenda::pluck('program', 'AgendaId');

        return view('events.create', compact('sponsors', 'artists', 'agendas'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'date' => 'required',
            'location' => 'required',
            'description' => 'required',
            'photo' => 'required',
            'SponsorId' => 'nullable|exists:sponsors,SponsorId',
            'ArtistId' => 'nullable|exists:artists,ArtistId',
            'AgendaId' => 'nullable|exists:agendas,AgendaId',
        ]);

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
        $sponsors = Sponsor::pluck('name', 'SponsorId');
        $artists = Artist::pluck('name', 'ArtistId');
        $agendas = Agenda::pluck('program', 'AgendaId');

        return view('events.edit', compact('event', 'sponsors', 'artists', 'agendas'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'date' => 'required',
            'location' => 'required',
            'description' => 'required',
            'photo' => 'required',
            'SponsorId' => 'nullable|exists:sponsors,SponsorId',
            'ArtistId' => 'nullable|exists:artists,ArtistId',
            'AgendaId' => 'nullable|exists:agendas,AgendaId',
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
