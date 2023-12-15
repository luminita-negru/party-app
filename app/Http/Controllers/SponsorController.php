<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sponsor;
use App\Http\Requests;

class SponsorController extends Controller
{
    public function index(Request $request)
    {
        $sponsors = Sponsor::orderBy('name', 'ASC')->paginate(5);
        $value = ($request->input('page', 1) - 1) * 5;
        return view('sponsors.list', compact('sponsors'))->with('i', $value);
    }

    public function create()
    {
        return view('sponsors.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'logo' => 'required',
        ]);

        // create new task
        Sponsor::create($request->all());

        return redirect()->route('sponsors.index')->with('success', 'Your sponsor added successfully!');
    }

    public function show($SponsorId)
    {
        $sponsor = Sponsor::find($SponsorId);
        return view('sponsors.show', compact('sponsor'));
    }

    public function edit($SponsorId)
    {
        $sponsor = Sponsor::find($SponsorId);
        return view('sponsors.edit', compact('sponsor'));
    }

    public function update(Request $request, $SponsorId)
    {
        $this->validate($request, [
            'name' => 'required',
            'logo' => '',
        ]);

        Sponsor::find($SponsorId)->update($request->all());

        return redirect()->route('sponsors.index')->with('success', 'sponsor updated successfully');
    }

    public function destroy($SponsorId)
    {
        Sponsor::find($SponsorId)->delete();
        return redirect()->route('sponsors.index')->with('success', 'sponsor removed successfully');
    }
}
