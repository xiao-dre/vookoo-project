@extends('generalNavbar')

@section('title', 'Movie Detail')

@section('content')
<div>
    <div class="card m-5" style="max-width: 2000px; height:400px">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="/storage/{{$movies->image}}" class="img-fluid rounded-start" alt="..." style="max-width: 2000px; height:400px">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $movies->title }}</h5>
                        <p class="card-text">{{ $movies->description }}</p>
                        <p class="card-text"><small>⭐<b>{{ $movies->rating }}</b> </small></p>
                    </div>
                </div>
            </div>
    </div>
    @foreach ($comments as $comment)
        <div class="card m-5" style="max-width: 2000px; height:200px">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="/storage/{{ $comment->user->profile_picture }}" class="img-fluid rounded-start" alt="..." style="max-width: 2000px; height:200px">
                </div>
                <div class="col">
                    <div class="card-body">
                        <h5 class="card-title" style="color: blue;">{{ $comment->user->name }}</h5>
                        <p class="card-text"><b>{{ $comment->comment_description }}</b></p>
                    </div>
                </div>
            </div>
        </div>      
    @endforeach
</div>

{{-- Form --}}
@if (auth()->user())
    <form action="/add-comment/{{auth()->user()->id}}/{{$movies->id}}" method="POST" class="m-5">
        @csrf
        <div class="m-3 mb-2">
            <textarea class="form-control" placeholder="Comment" id="floatingTextarea2" style="height: 300px" name="comment_description">
            </textarea>
        </div>
        <button type="submit" class="btn btn-primary mb-5 ms-3">Submit</button>

    </form>  
@endif

@endsection

@include('footer')