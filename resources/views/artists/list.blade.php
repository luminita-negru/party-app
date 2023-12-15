@extends('layouts.master')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="panel panel-default">
        <div class="panel-heading">
            Lista artistilor
        </div>
        <div class="panel-body">
            <div class="form-group">
                <div class="pull-right">
                    <a href="{{ route('artists.create') }}" class="btn btn-default">Adaugare Artist Nou</a>
                </div>
            </div>

            <table class="table table-bordered table-stripped">
                <tr>
                    <th width="20">No</th>
                    <th>Titlu</th>
                    <th>Descriere</th>
                    <th width="300">Actiune</th>
                </tr>
                @if (count($artists) > 0)
                    @foreach ($artists as $key => $artist)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $artist->name }}</td>
                            <td>{{ $artist->genre }}</td>
                            <td>
                                <a class="btn btn-success" href="{{ route('artists.show', $artist->ArtistId) }}">Vizualizare</a>
                                <a class="btn btn-primary" href="{{ route('artists.edit', $artist->ArtistId) }}">Modificare</a>
                                {{ Form::open(['method' => 'DELETE', 'route' => ['artists.destroy', $artist->ArtistId], 'style' => 'display:inline']) }}
                                {{ Form::submit('Delete', ['class' => 'btn btndanger']) }}
                                {{ Form::close() }}
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4">Nu exista sarcini!</td>
                    </tr>
                @endif
            </table>

            <!-- Introduce nr pagina -->
            {{ $artists->render() }}
        </div>
    </div>
@endsection
