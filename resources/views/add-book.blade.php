@extends('Navbar')

@if ($books)
@section('title', 'Update Book')
@else
@section('title', 'Add Book')
@endif


@section('content')
@if ($books)
<h1 class="text-center mt-3">Update Book</h1>
@else
<h1 class="text-center mt-3">Add Book</h1>
@endif

<form method="POST" 
    @if ($books)
        action="/update-book/{{$books->id}}"
    @else
        action="/add-book"
    @endif
    class="ms-5 mb-3 me-5 mt-4 p-5 bg-secondary bg-opacity-10 rounded-3" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label class="form-label">Book Title</label>
      <input type="text" class="form-control" aria-describedby="emailHelp" name="book_title" 
      @if ($books)
          value="{{$books->title}}"
      @endif>
    </div>
    <div class="mb-3">
        <label class="form-label">Book Genre</label>
        <select class="form-select" aria-label="Default select example" name="book_genre">
            @foreach ($genres as $genre)
                <option value={{ $genre->id }}>{{ $genre->genre_name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
      <label  class="form-label">Book Description</label>
      <input type="text" class="form-control" name="book_description"
      @if ($books)
        value="{{$books->description}}"
      @endif>
    </div>
    <div class="mb-3">
        <label for="formFile" class="form-label">Default file input example</label>
        <input class="form-control" type="file" id="formFile" name="book_cover">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

{{-- Notification --}}
    @if ($errors->any())
            @foreach ($errors->all() as $error)
            <div class="mb-3 ms-5 me-5 bg-danger bg-opacity-10 rounded-3 p-3">
                {{ $error }} <br>
            </div>
            @endforeach
        </div>
        @endif
@endsection

@include('footer')
