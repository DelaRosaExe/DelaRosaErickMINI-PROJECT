@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Create</h1>
                <form action="/admin/mangas/create" method="POST">
                @csrf
                    <div class="form-group">
                        <label for="manga_name">Name</label>
                        <input class="form-control" type="text" name="manga_name" id="manga_name">
                    </div>
                    <div class="form-group">
                        <label for="volumes">Volumes</label>
                        <input class="form-control" type="text" name="volumes" id="volumes">
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <input class="form-control" type="text" name="status" id="status">
                    </div>
                    <div class="form-group">
                        <label for="genres">Genres</label>
                        <input class="form-control" type="text" name="genres" id="genres">
                    </div>
                    <div class="form-group">
                        <label for="authors">Authors</label>
                        <input class="form-control" type="text" name="authors" id="authors">
                    </div>
                    <div class="form-group">
                        <label for="published">Published</label>
                        <input class="form-control" type="text" name="published" id="published">
                    </div>
                    <a href="/admin/mangas/" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Cancel</a>
                    <button type="submit" class="btn btn-success btn-lg active" role="button" aria-pressed="true">Create</>
                    </form>
            </div>
        </div>
    </div>
@endsection