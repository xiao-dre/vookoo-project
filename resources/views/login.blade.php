@extends('navbar')

@section('title', 'Log in')

@section('content')
<form method="POST" action="/login" class="bg-secondary bg-opacity-10 p-5 m-5 rounded-2 justify-content-center w-50 position-absolute start-50 translate-middle-x">
  @csrf 
  <h1 class="text-center pb-3">Log in</h1>
    <div class="mb-3">
      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" name="email">
    </div>
    <div class="mb-3">
      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
    </div>
    <div class="mb-3 form-check">
      <input type="checkbox" class="form-check-input" id="exampleCheck1">
      <label class="form-check-label" for="exampleCheck1" name="check">Remember Me</label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection

@extends('footer')


