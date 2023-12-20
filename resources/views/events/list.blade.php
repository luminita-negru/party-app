@extends('layouts.app')

@section('title', 'Lista Evenimentelor')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="panel panel-default">
        <div class="panel-heading">Lista Evenimentelor</div>
        <div class="panel-body">
            <div class="form-group">
                <div class="pull-right">
                    <a href="{{ route('events.create') }}" class="btn btn-default">Adăugare Eveniment Nou</a>
                </div>
            </div>

            <table class="table table-bordered table-striped">
                <tr>
                    <th width="20">No</th>
                    <th>Nume</th>
                    <th>Data</th>
                    <th>Locație</th>
                    <th>Descriere</th>
                    <th>Price</th>
                    <th>Acțiune</th>
                </tr>
                @if (count($events) > 0)
                    <?php $i = 0; ?>
                    @foreach ($events as $event)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $event->name }}</td>
                            <td>{{ $event->date }}</td>
                            <td>{{ $event->location }}</td>
                            <td>{{ $event->description }}</td>
                            <td>{{ $event->price }}</td>
                            <td>
                                <a class="btn btn-success" href="{{ route('events.show', $event->id) }}">Vizualizare</a>
                                <a class="btn btn-primary" href="{{ route('events.edit', $event->id) }}">Modificare</a>
                                {!! Form::open(['method' => 'DELETE', 'route' => ['events.destroy', $event->id], 'style' => 'display:inline']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="9">Nu există evenimente!</td>
                    </tr>
                @endif
            </table>

            <!-- Paginare -->
            {{ $events->render() }}
        </div>
    </div>
@endsection
