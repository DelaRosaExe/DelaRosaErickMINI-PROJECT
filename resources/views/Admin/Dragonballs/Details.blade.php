@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Details</h1>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><b>{{ $dragonball->Character}}</b></h4>
                        <p class="card-text">Power Lvl{{ $dragonball->Power_Level }}</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>Saga or Movie: </b> {{ $dragonball->Saga_or_Movie }}</li>
                        <li class="list-group-item"><b>Dragon Ball Serie(s): </b> {{ $dragonball->Dragon_Ball_Series }}</li>
                    </ul>
                    <div class="card-body">
                        <a href="/admin/dragonballs/" class="btn btn-secondary btn-sm active" role="button" aria-pressed="true">Back</a>
                        <a href="/admin/dragonballs/edit/{{ $dragonball->_id }}" class="btn btn-primary btn-sm active" role="button" aria-pressed="true">Edit</a>
                        <a href="/admin/dragonballs/delete/{{ $dragonball->_id }}" class="btn btn-danger btn-sm active" role="button" aria-pressed="true">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
