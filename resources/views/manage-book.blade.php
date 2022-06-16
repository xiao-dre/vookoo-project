@extends('navbar')

@section('title', 'Manage Book')

@section('content')

    <h1 class="pt-3 ps-3">Manage Book</h1>
    <a href="/add-book" type="button" class="btn btn-primary m-3 ps-3 pe-3">Add Book</a>
    <table class="table table-bordered text-center ms-3" style="width: 70%">
        <thead>
            <th scope="col"> No.</th>
            <th scope="col"> Title</th>
            <th scope="col"> Genre</th>
            <th scope="col"> Picture</th>
            <th scope="col"> Description</th>
            <th scope="col"> Action</th>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr class="align-middle">
                    <td scope="row"> {{ $book->id }}</td>
                    <td class=""><b>{{ $book->title }}</b></td>
                    <td>{{ $book->genre->genre_name }}</td>
                    <td><img src="/storage/{{$book->image}}" alt="" style="width: 10%"></td>
                    <td>{{ $book->description }}</td>
                    <td>
                        <a href="/update-book/{{ $book->id }}" type="button" class="btn btn-warning m-3">Update</a>
                        <a href="/delete-book/{{ $book->id }}" type="button" class="btn btn-danger m-3">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@include('footer')
