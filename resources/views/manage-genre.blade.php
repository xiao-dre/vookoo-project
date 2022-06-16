@extends('navbar')

@section('title', 'Manage Movie')

@section('content')

    <h1 class="pt-3 ps-3">Manage Genre</h1>
    <a href="/add-genre" type="button" class="btn btn-primary m-3 ps-3 pe-3">Add Genre</a>
    <table class="table table-bordered text-center ms-3" style="width: 70%">
        <thead>
            <th scope="col"> No.</th>
            <th scope="col"> Genre Name</th>
            <th scope="col"> Action</th>
        </thead>
        <tbody>
            @foreach ($genres as $genre)
                <tr class="align-middle">
                    <td scope="row"> {{ $genre->id }}</td>
                    <td>{{ $genre->genre_name }}</td>
                    <td>
                        <a href="/update-genre/{{ $genre->id }}" type="button" class="btn btn-warning m-3">Update</a>
                        <a href="/delete-genre/{{ $genre->id }}" type="button" class="btn btn-danger m-3">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@include('footer')
