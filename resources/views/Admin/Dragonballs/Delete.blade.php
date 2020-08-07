@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Delete</h1>
                <form action="/admin/dragonballs/delete" method= "POST">
                @csrf
                @method('DELETE')
                <input type="hidden" name="dragonballid" id="dragonballid" value="{{ $dragonball->_id }}">
                <div class="form-group">
                        <label for="Character">Character</label>
                        <input class="form-control" type="text" name="Character" id="Character" value="{{ $dragonball->Character }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="Power_Level">Power level</label>
                        <input class="form-control" type="int" name="Power_Level" id="Power_Level" value="{{ $dragonball->Power_Level }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="Saga_or_Movie">Saga or Movie</label>
                        <input class="form-control" type="text" name="Saga_or_Movie" id="Saga_or_Movie" value="{{ $dragonball->Saga_or_Movie }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="Dragon_Ball_Series">Dragon Ball Series</label>
                        <input class="form-control" type="text" name="Dragon_Ball_Series" id="Dragon_Ball_Series" value="{{ $dragonball->Dragon_Ball_Series }}" disabled>
                    </div>
                    <a href="/admin/dragonballs/" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Cancel</a>
                    <button type="submit" class="btn btn-danger btn-lg active" role="button" aria-pressed="true">Delete</button>
                </form>
            </div>
        </div>
    </div>
@endsection