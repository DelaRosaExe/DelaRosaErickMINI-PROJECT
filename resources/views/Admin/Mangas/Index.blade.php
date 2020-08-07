@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Mangas</h1>
                <a class="text-right" href="/admin/mangas/create">Create New</a>
                <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Volumes</th>
                        <th scope="col">Status</th>
                        <th scope="col">Genres</th>
                        <th scope="col">Author(s)</th>

                        <th scope="col">Options</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($mangas as $manga)
                    <tr>
                        <th scope="row">{{ $loop->index + 1}}</th>
                        <td>{{ $manga->manga_name }}</td>
                        <td>{{ $manga->volumes }}</td>
                        <td>{{ $manga->status }}</td>
                        <td>{{ $manga->genres }}</td>
                        <td>{{ $manga->authors }}</td>

                        <td>
                            <a href="/admin/mangas/{{ $manga->_id }}">Details</a> |
                            <a href="/admin/mangas/edit/{{ $manga->_id }}">Edit</a> |
                            <a href="/admin/mangas/delete/{{ $manga->_id }}">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection