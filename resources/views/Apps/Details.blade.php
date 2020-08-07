@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="card col-md-12">
                    <div class="card-body">
                    <h1 class="card-title">{{ $app->App }}</h1>
                    <h3 class="card-subtitle mb-2 text-muted">Size: {{ $app->Size }}</h3>
                    <p class="card-text">Installs: {{ $app->Installs }}</p>
                    <p class="card-text"> Genre(s): {{ $app->Genres }}</p>
                </div>
                <div class="card-footer">
                    <p>Rating:</p>
                    <input type="radio" name="rating" id="rating">&nbsp1 </input>
                    <input type="radio" name="rating" id="rating">&nbsp2 </input>
                    <input type="radio" name="rating" id="rating">&nbsp3 </input>
                    <input type="radio" name="rating" id="rating">&nbsp4 </input>
                    <input type="radio" name="rating" id="rating">&nbsp5 </input>
                </div>
                <br>
            </div>

            <div class="col-md-12">
                <h1> <br> Add Comments </br> </h1>
                <form action="/apps/comment" method="POST">
                    @csrf
                    <input type="hidden" name="appid" id="appid" value="{{ $app->_id }}">
                    <div class="form-group">
                        <label for="userid">User ID</label>
                        <input type="text" class="form-control" name="userid" id="userid" disabled>
                    </div>
                    <div class="form-group">
                        <label for="comment">Comments</label>
                        <textarea name="comment" id="comment" cols="30" rows="4" class="form-control" disabled></textarea>
                    </div>
                    <button class="btn btn-success" type="submit" disabled>Add comment</button>
                </form>
            </div>


            <a href="/apps/" class="card-link"> <br>&nbsp&nbsp&nbsp&nbsp&nbspGo back </br> </a> 

        </div>
    </div>
@endsection