@extends('layouts.app')

@section('title', 'Adaugă Eveniment Nou')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Adaugă Eveniment Nou</div>
        <div class="panel-body">

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Errors:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{ Form::open(['route' => 'events.store', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'eventForm']) }}

            <div class="form-group">
                {{ Form::label('name', 'Nume') }}
                {{ Form::text('name', old('name'), ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::label('description', 'Descriere') }}
                {{ Form::textarea('description', old('description'), ['class' => 'form-control', 'rows' => 3]) }}
            </div>

            <div class="form-group">
                {{ Form::label('date', 'Data') }}
                {{ Form::date('date', old('date'), ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::label('location', 'Locație') }}
                {{ Form::text('location', old('location'), ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::label('photo', 'Fotografie') }}
                {{ Form::file('photo', ['class' => 'form-control']) }}
            </div>

            <div id="artistsContainer">
                <div class="artist-row">
                    <div class="form-group">
                        {{ Form::label('artists[]', 'Artist') }}
                        {{ Form::select('artists[]', $artists, null, ['class' => 'form-control', 'placeholder' => 'Select Artist']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('startTimes[]', 'Ora de început') }}
                        {{ Form::time('startTimes[]', null, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('finishTimes[]', 'Ora de sfârșit') }}
                        {{ Form::time('finishTimes[]', null, ['class' => 'form-control']) }}
                    </div>

                    <button type="button" class="btn btn-danger remove-artist">Remove Artist</button>
                </div>
            </div>

            <button type="button" class="btn btn-success" id="addArtist">Add Artist</button>

            <div id="sponsorsContainer">
                <div class="sponsor-row">
                    <div class="form-group">
                        {{ Form::label('sponsors[]', 'Sponsor') }}
                        {{ Form::select('sponsors[]', $sponsors, null, ['class' => 'form-control', 'placeholder' => 'Select Sponsor']) }}
                    </div>

                    <button type="button" class="btn btn-danger remove-sponsor">Remove Sponsor</button>
                </div>
            </div>

            <button type="button" class="btn btn-success" id="addSponsor">Add Sponsor</button>

            <div class="form-group">
                {{ Form::submit('Adaugă Eveniment', ['class' => 'btn btn-info']) }}
                <a href="{{ route('events.index') }}" class="btn btn-default">Cancel</a>
            </div>

            {{ Form::close() }}

        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const addArtistBtn = document.getElementById('addArtist');
            const artistsContainer = document.getElementById('artistsContainer');
            const addSponsorBtn = document.getElementById('addSponsor');
            const sponsorsContainer = document.getElementById('sponsorsContainer');
            const eventForm = document.getElementById('eventForm');

            document.querySelectorAll('.remove-sponsor').forEach(function (removeButton) {
                removeButton.addEventListener('click', function () {
                    if(sponsorsContainer.children.length == 1){
                        return;
                    }
                    sponsorsContainer.removeChild(removeButton.parentElement);
                });
            });

            document.querySelectorAll('.remove-artist').forEach(function (removeButton) {
                removeButton.addEventListener('click', function () {
                    if(artistsContainer.children.length == 1){
                        return;
                    }
                    artistsContainer.removeChild(removeButton.parentElement);
                });
            });
            

            addArtistBtn.addEventListener('click', function () {
                const artistRow = document.querySelector('.artist-row').cloneNode(true);
                artistRow.querySelectorAll('input, select').forEach(function (input) {
                    input.value = '';
                });

                const removeButton = artistRow.querySelector('.remove-artist');
                removeButton.addEventListener('click', function () {
                    if(artistsContainer.children.length == 1){
                        return;
                    }
                    artistsContainer.removeChild(artistRow);
                });

                artistsContainer.appendChild(artistRow);
            });

            addSponsorBtn.addEventListener('click', function () {
                const sponsorRow = document.querySelector('.sponsor-row').cloneNode(true);
                sponsorRow.querySelectorAll('select').forEach(function (select) {
                    select.value = '';
                });

                const removeButton = sponsorRow.querySelector('.remove-sponsor');
                removeButton.addEventListener('click', function () {
                    if(sponsorsContainer.children.length == 1){
                        return;
                    }
                    sponsorsContainer.removeChild(sponsorRow);
                });

                sponsorsContainer.appendChild(sponsorRow);
            });
        });
    </script>
@endsection
