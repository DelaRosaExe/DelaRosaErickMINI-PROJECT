@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Edit</h1>
                <form action="/admin/mangas/edit" method= "POST">
                @csrf
                <input type="hidden" name="mangaid" id="mangaid" value="{{ $manga->_id }}">
                <div class="form-group">
                        <label for="manga_name">Name</label>
                        <input class="form-control" type="text" name="manga_name" id="manga_name" value="{{ $manga->manga_name }}">
                    </div>
                    <div class="form-group">
                        <label for="volumes">Volumes</label>
                        <input class="form-control" type="text" name="volumes" id="volumes" value="{{ $manga->volumes }}">
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <input class="form-control" type="text" name="status" id="status" value="{{ $manga->status }}">
                    </div>
                    <div class="form-group">
                        <label for="genres">Genres</label>
                        <input class="form-control" type="text" name="genres" id="genres" value="{{ $manga->genres }}">
                    </div>
                    <div class="form-group">
                        <label for="authors">Author(s)</label>
                        <input class="form-control" type="text" name="authors" id="authors" value="{{ $manga->authors }}">
                    </div>
                <a href="/admin/mangas/" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Cancel</a>
                <button type="submit" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Edit</button>
                </form>
            </div>
        </div>
    </div>
@endsection