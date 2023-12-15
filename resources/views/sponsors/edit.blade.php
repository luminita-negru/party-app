@extends('layouts.master')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading"> Edit the Sponsor</div>
        <div class="panel-body">
            <!-- Există înregistrări în tabelul sponsor -->
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Eroare:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Populez câmpurile formularului cu datele aferente din tabela sponsor -->
            {!! Form::model($sponsor, ['method' => 'PATCH', 'route' => ['sponsors.update', $sponsor->SponsorId]]) !!}
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" value="{{ $sponsor->name }}">
            </div>
            <div class="form-group">
                <label for="logo">Logo</label>
                <input type="text" name="logo" class="form-control" value="{{ $sponsor->logo }}">
            </div>
            <div class="form-group">
                <input type="submit" value="Save" class="btn btn-info">
                <a href="{{ route('sponsors.index') }}" class="btn btndefault">Cancel</a>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection

