<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artist;
use App\Http\Requests;

class ArtistController extends Controller
{
    public function index(Request $request)
    {
        $artists = Artist::orderBy('name', 'ASC')->paginate(5);
        $value = ($request->input('page', 1) - 1) * 5;
        return view('artists.list', compact('artists'))->with('i', $value);
    }

    public function create()
    {
        return view('artists.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'genre' => 'required',
        ]);

        // create new task
        Artist::create($request->all());

        return redirect()->route('artists.index')->with('success', 'Your artist added successfully!');
    }

    public function show($ArtistId)
    {
        $artist = Artist::find($ArtistId);
        return view('artists.show', compact('artist'));
    }

    public function edit($ArtistId)
    {
        $artist = Artist::find($ArtistId);
        return view('artists.edit', compact('artist'));
    }

    public function update(Request $request, $ArtistId)
    {
        $this->validate($request, [
            'name' => 'required',
            'genre' => 'required',
        ]);

        Artist::find($ArtistId)->update($request->all());

        return redirect()->route('artists.index')->with('success', 'Artist updated successfully');
    }

    public function destroy($ArtistId)
    {
        Artist::find($ArtistId)->delete();
        return redirect()->route('artists.index')->with('success', 'Artist removed successfully');
    }
}
