@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Create</h1>
                <form action="/admin/dragonballs/create" method="POST">
                @csrf
                    <div class="form-group">
                        <label for="Character">Character</label>
                        <input class="form-control" type="text" name="Character" id="Character">
                    </div>
                    <div class="form-group">
                        <label for="Power_Level">Power level</label>
                        <input class="number" type="int" name="Power_Level" id="Power_Level">
                    </div>
                    <div class="form-group">
                        <label for="Saga_or_Movie">Saga or Movie</label>
                        <input class="form-control" type="text" name="Saga_or_Movie" id="Saga_or_Movie">
                    </div>
                    <div class="form-group">
                        <label for="Dragon_Ball_Series">Dragon Ball Series</label>
                        <input class="form-control" type="text" name="Dragon_Ball_Series" id="Dragon_Ball_Series">
                    </div>
                    <a href="/admin/dragonballs/" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Cancel</a>
                    <button type="submit" class="btn btn-success btn-lg active" role="button" aria-pressed="true">Create</>
                    </form>
            </div>
        </div>
    </div>
@endsection