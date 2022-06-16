@extends('navbar')

@section('title', 'User Profile')

@section('content')
  <div class="card mx-auto m-5" style="width: 18rem;" >
    <img src="/storage/{{auth()->user()->profile_picture}}" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">{{ auth()->user()->name }}</h5>
      <p class="card-text">{{ auth()->user()->email }} </p>
      <a href="/update-profile/{{auth()->user()->id}}" class="btn btn-primary">Update Profile</a>
    </div>
  </div>
@endsection

@include('footer')