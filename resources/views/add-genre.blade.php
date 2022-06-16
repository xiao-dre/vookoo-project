@extends('navbar')

@if ($genres)
    @section('title', 'Update Genre')
@else
    @section('title', 'Add Genre')
@endif


@section('title', 'Add Genre')

@section('content')
    @if ($genres)
        <h1 class="text-center pt-5"> Update Genre </h1>
    @else
        <h1 class="text-center pt-5"> Add Genre </h1>
    @endif
    
        <form method="POST" 
        @if ($genres)
            action="/update-genre/{{$genres->id}}"
        @else
            action="/add-genre"
        @endif
        class="ms-5 mb-3 me-5 mt-4 p-5 bg-secondary bg-opacity-10 rounded-3" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Genre Name</label>
            <input type="text" class="form-control" aria-describedby="emailHelp" name="genre_name"
            @if ($genres)
                value="{{$genres->genre_name}}"
            @endif>
        </div>
        <div class="d-grid gap-2">
            <button class="btn btn-primary" type="submit">Submit</button>
        </div>
    </form>
@endsection

@include('footer')