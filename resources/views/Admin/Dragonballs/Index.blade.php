@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Dragon Ball</h1>
                <a class="text-right" href="/admin/dragonballs/create">Create New</a>
                <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Character</th>
                        <th scope="col">Power level</th>
                        <th scope="col">Saga or Movie</th>
                        <th scope="col">Dragon Ball Series</th>
                        <th scope="col">Options</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($dragonballs as $dragonball)
                    <tr>
                        <th scope="row">{{ $loop->index + 1}}</th>
                        <td>{{ $dragonball->Character }}</td>
                        <td>{{ $dragonball->Power_Level }}</td>
                        <td>{{ $dragonball->Saga_or_Movie }}</td>
                        <td>{{ $dragonball->Dragon_Ball_Series }}</td>
                        <td>
                            <a href="/admin/dragonballs/{{ $dragonball->_id }}">Details</a> |
                            <a href="/admin/dragonballs/edit/{{ $dragonball->_id }}">Edit</a> |
                            <a href="/admin/dragonballs/delete/{{ $dragonball->_id }}">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection