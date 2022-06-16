@extends('navbar')

@section('title', 'Manage User')

@section('content')

        <h1 class="pt-3 ps-3">Manage User</h1>
        <a href="/add-user" type="button" class="btn btn-primary m-3 ps-3 pe-3">Add User</a>
        <table class="table table-bordered text-center ms-3" style="width: 70%">
            <thead>
            <th scope="col"> #</th>
            <th scope="col">Name</th>
            <th scope="col"> Email</th>
            <th scope="col"> Role</th>
            <th scope="col"> Gender</th>
            <th scope="col"> Address</th>
            <th scope="col"> Profile Picture</th>
            <th scope="col">DOB</th>
            <th scope="col"> Action</th>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td scope="row"> {{ $user->id }}</td>
                    <td>{{$user->name}}</td>
                    <td>{{ $user->email }}</td>
                    <td class="text-warning"><b>{{ $user->userRole->user_role_name }}</b></td>
                    <td>{{ $user->gender }}</td>
                    <td>{{ $user->address }}</td>
                    <td><img src="/storage/{{$user->profile_picture}}" alt="" style="width: 30%"></td>
                    <td>{{ $user->date_of_birth }}</td>
                    <td>
                        <a href="/update-user/{{ $user->id }}" type="button" class="btn btn-warning m-3">Update</a>
                        <a href="/delete-user/{{ $user->id }}" type="button" class="btn btn-danger m-3">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
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
