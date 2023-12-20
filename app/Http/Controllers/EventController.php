<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Sponsor;
use App\Models\Artist;
use App\Models\Agenda;
use App\Models\SponsorEvents;
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

        return view('events.create', compact('sponsors', 'artists'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'date' => 'required',
            'location' => 'required',
            'description' => 'required',
            'photo' => 'required',
            'price' => 'required',
            'artists' => 'required|array|min:1',
            'sponsors' => 'required|array|min:1',
            'artists.*' => 'required',
            'sponsors.*' => 'required',
        ]);

        $event = Event::create($request->all());
        if (!$event) {
            throw new \Exception('Failed to create the event.');
        }
        $artists = $request->input('artists');
        $startTimes = $request->input('startTimes');
        $finishTimes = $request->input('finishTimes');


        // Save each artist and their time to the agendas table
        for ($i = 0; $i < count($artists); $i++) {
            $agenda = new Agenda([
                'ArtistId' => $artists[$i],
                'startTime' => $startTimes[$i],
                'finishTime' => $finishTimes[$i],
                'EventId' => $event->id,
            ]);

            $agenda->save();
        }

        $sponsors = $request->input('sponsors');
        for ($i = 0; $i < count($sponsors); $i++) {
            $sponsor = new SponsorEvents([
                'SponsorId' => $sponsors[$i],
                'EventId' => $event->id,
            ]);

            $sponsor->save();
        }

        return redirect()->route('events.index')->with('success', 'Your event added successfully!');
    }

    public function show($id)
    {
        $event = Event::find($id);
        return view('events.show', compact('event'));
    }

    public function edit($id)
    {
        $event = Event::with(['sponsors', 'agendas'])->find($id);
        $sponsors = Sponsor::pluck('name', 'SponsorId');
        $artists = Artist::pluck('name', 'ArtistId');
        
        return view('events.edit', compact('event', 'sponsors', 'artists'));
    }

    public function update(Request $request, $id)  
    {
        $this->validate($request, [
            'name' => 'required',
            'date' => 'required',
            'location' => 'required',
            'description' => 'required',
            'photo' => 'required',
            'price' => 'required',
            'artists' => 'required|array|min:1',
            'sponsors' => 'required|array|min:1',
            'artists.*' => 'required',
            'sponsors.*' => 'required',
        ]);

        $event = Event::find($id);
        $filename = time().'.'.request()->photo->getClientOriginalExtension();
        request()->photo->move(public_path('images'), $filename);
        request()->photo = $filename;
        $event->update($request->all());
        $event->update([
            'photo' => $filename,
        ]);
        
        $event->hasMany(Agenda::class, 'EventId')->delete();
        $event->hasMany(SponsorEvents::class, 'EventId')->delete();

        $artists = $request->input('artists');
        $startTimes = $request->input('startTimes');
        $finishTimes = $request->input('finishTimes');


        // Save each artist and their time to the agendas table
        for ($i = 0; $i < count($artists); $i++) {
            $agenda = new Agenda([
                'ArtistId' => $artists[$i],
                'startTime' => $startTimes[$i],
                'finishTime' => $finishTimes[$i],
                'EventId' => $event->id,
            ]);

            $agenda->save();
        }

        $sponsors = $request->input('sponsors');
        for ($i = 0; $i < count($sponsors); $i++) {
            $sponsor = new SponsorEvents([
                'SponsorId' => $sponsors[$i],
                'EventId' => $event->id,
            ]);

            $sponsor->save();
        }

        return redirect()->route('events.index')->with('success', 'Event updated successfully');
    }

    public function destroy($id)
    {
        Event::find($id)->delete();
        return redirect()->route('events.index')->with('success', 'Event removed successfully');
    }
}
