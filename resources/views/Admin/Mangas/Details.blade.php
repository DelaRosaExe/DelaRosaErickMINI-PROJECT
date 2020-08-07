@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Details</h1>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><b>{{ $manga->manga_name}}</b></h4>
                        <p class="card-text"><b>Volumes: </b> {{ $manga->volumes }}</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>Status: </b> {{ $manga->status }}</li>
                        <li class="list-group-item"><b>Genres: </b> {{ $manga->genres }}</li>
                        <li class="list-group-item"><b>Author(s): </b> {{ $manga->authors }}</li>
                    </ul>
                    <div class="card-body">
                        <a href="/admin/mangas/" class="btn btn-secondary btn-sm active" role="button" aria-pressed="true">Back</a>
                        <a href="/admin/mangas/edit/{{ $manga->_id }}" class="btn btn-primary btn-sm active" role="button" aria-pressed="true">Edit</a>
                        <a href="/admin/mangas/delete/{{ $manga->_id }}" class="btn btn-danger btn-sm active" role="button" aria-pressed="true">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
