@extends('navbar')

@section('title', 'Home')

@section('content')
{{-- <h1>Hello</h1> --}}
    <form class="d-flex pt-3 ps-3 w-25" method="POST" action="search">
        @csrf
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
        <button type="submit" class="btn btn-primary">Search</button>
    </form>

    <div class="d-flex justify-content-evenly p-5">
        @foreach ($books as $book)
        <div class="card" style="width: 18rem;">
            <img src="/storage/{{$book->image}}" class="card-img-top" style="height: 100%">
            <div class="card-body">
                <h5 class="card-title">{{ $book->title }}</h5>
                <p class="card-text">{{ $book->description }}</p>
                <a href="/books-detail/{{$book->id}}" class="btn btn-primary">Get Details</a>
            </div>
        </div>
        @endforeach
    </div>
    <div class="text-center pt-5">
        {{$books->links()}}
    </div>
@endsection


@extends('footer')
