@extends('layouts.master')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="panel panel-default">
        <div class="panel-heading">
            Lista sponsorilor
        </div>
        <div class="panel-body">
            <div class="form-group">
                <div class="pull-right">
                    <a href="{{ route('sponsors.create') }}" class="btn btn-default">Adaugare sponsor Nou</a>
                </div>
            </div>

            <table class="table table-bordered table-stripped">
                <tr>
                    <th width="20">No</th>
                    <th>Titlu</th>
                    <th>Descriere</th>
                    <th width="300">Actiune</th>
                </tr>
                @if (count($sponsors) > 0)
                    @foreach ($sponsors as $key => $sponsor)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $sponsor->name }}</td>
                            <td>{{ $sponsor->logo }}</td>
                            <td>
                                <a class="btn btn-success" href="{{ route('sponsors.show', $sponsor->SponsorId) }}">Vizualizare</a>
                                <a class="btn btn-primary" href="{{ route('sponsors.edit', $sponsor->SponsorId) }}">Modificare</a>
                                {{ Form::open(['method' => 'DELETE', 'route' => ['sponsors.destroy', $sponsor->SponsorId], 'style' => 'display:inline']) }}
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
            {{ $sponsors->render() }}
        </div>
    </div>
@endsection
