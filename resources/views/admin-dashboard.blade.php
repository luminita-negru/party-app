<!-- resources/views/admin-dashboard.blade.php -->

@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center bg-purple text-purple">
                        <h2 class="mb-0">Admin Dashboard</h2>
                    </div>

                    <div class="card-body">
                        <div class="list-group">
                            <a href="{{ route('events.index') }}" class="list-group-item list-group-item-action">
                                Manage Events
                            </a>
                            <a href="{{ route('artists.index') }}" class="list-group-item list-group-item-action">
                                Manage Artists
                            </a>
                            <a href="{{ route('sponsors.index') }}" class="list-group-item list-group-item-action">
                                Manage Sponsors
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
