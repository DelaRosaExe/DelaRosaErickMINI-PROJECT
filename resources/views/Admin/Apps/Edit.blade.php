@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Edit</h1>
                <form action="/admin/apps/edit" method= "POST">
                @csrf
                <input type="hidden" name="appid" id="appid" value="{{ $app->_id }}">
                    <div class="form-group">
                        <label for="App">App</label>
                        <input class="form-control" type="text" name="App" id="App" value="{{ $app->App }}">
                    </div>
                    <div class="form-group">
                        <label for="Size">Size</label>
                        <input class="form-control" type="text" name="Size" id="Size" value="{{ $app->Size }}">
                    </div>
                    <div class="form-group">
                        <label for="Installs">Installs</label>
                        <input class="form-control" type="text" name="Installs" id="Installs" class="form-control" value="{{ $app->Installs }}">
                    </div>
                    <div class="form-group">
                        <label for="Type">Type</label>
                        <input class="form-control" type="text" name="Type" id="Type" class="form-control" value="{{ $app->Type }}">
                    </div>
                    <div class="form-group">
                        <label for="Genres">Genres</label>
                        <input class="form-control" type="text" name="Genres" id="Genres" value="{{ $app->Genres }}">
                    </div>
                <a href="/admin/apps/" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Cancel</a>
                <button type="submit" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Edit</button>
                </form>
            </div>
        </div>
    </div>
@endsection