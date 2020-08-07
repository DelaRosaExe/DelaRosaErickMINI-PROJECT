@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Delete</h1>
                <form action="/admin/mangas/delete" method= "POST">
                @csrf
                @method('DELETE')
                <input type="hidden" name="mangaid" id="mangaid" value="{{ $manga->_id }}">
                <div class="form-group">
                        <label for="manga_name">Name</label>
                        <input class="form-control" type="text" name="manga_name" id="manga_name" value="{{ $manga->manga_name }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="volumes">Volumes</label>
                        <input class="form-control" type="int" name="volumes" id="volumes" value="{{ $manga->volumes }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <input class="form-control" type="int" name="status" id="status" value="{{ $manga->status }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="genres">Genres</label>
                        <input class="form-control" type="int" name="genres" id="genres" value="{{ $manga->genres }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="authors">Authors</label>
                        <input class="form-control" type="int" name="authors" id="authors" value="{{ $manga->authors }}" disabled>
                    </div>
                    <a href="/admin/mangas/" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Cancel</a>
                    <button type="submit" class="btn btn-danger btn-lg active" role="button" aria-pressed="true">Delete</button>
                </form>
            </div>
        </div>
    </div>
@endsection