@extends('navbar')

@if ($users)
@section('title', 'Update User')
@else
@section('title', 'Add User')
@endif

@section('content')
<form method="POST" 
@if ($users)
action="/update-user/{{$users->id}}" 
@else
action="/add-user" 
@endif
class="bg-secondary bg-opacity-10 p-5 m-5 rounded-2 justify-content-center w-50 position-absolute start-50 translate-middle-x" enctype="multipart/form-data">
    @csrf
    @if ($users)
    <h1 class="text-center pb-3">Update User</h1>
    @else
    <h1 class="text-center pb-3">Add User</h1>
    @endif
    <div class="mb-3">
      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="FullName" name="name"
      @if ($users)
          value="{{$users->name}}"
      @endif
      >
    </div>
    <div class="mb-3">
      <input type="email" class="form-control" id="exampleInputPassword1" placeholder="Email" name="email"
      @if ($users)
      value="{{$users->email}}"
      @endif
      >
    </div>
    <div class="mb-3">
        <label class="form-label">User Role</label>
        <select class="form-select" aria-label="Default select example" name="user_role">
            @foreach ($user_roles as $user_role)
                <option value={{ $user_role->id }}>{{ $user_role->user_role_name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
    </div>
    <div class="mb-3">
      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Confirm Password" name="confirm_password">
    </div>
    <div class="d-flex mb-3">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault1" value="male" checked>
            <label class="form-check-label" for="flexRadioDefault1">
              Male
            </label>
          </div>
          <div class="form-check ms-3">
            <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault2" value="female" >
            <label class="form-check-label" for="flexRadioDefault2">
              Female
            </label>
          </div>
    </div>
    <div class="mb-3">
        <textarea class="form-control" placeholder="Address" id="floatingTextarea2" style="height: 100px" name="address">
        @if ($users)
          {{$users->address}}
        @endif
        </textarea>
    </div>
    <div class="mb-3">
        <input type="date" class="form-control" id="exampleInputPassword1" placeholder="08/09/2011" name="dob"
        @if ($users)
        value="{{$users->date_of_birth}}"
        @endif
        >
    </div>
    <div class="mb-3">
        <input class="form-control" type="file" id="formFile" name="profile_picture">
    </div>
    <div class="d-grid gap-2">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
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



@extends('footer')
