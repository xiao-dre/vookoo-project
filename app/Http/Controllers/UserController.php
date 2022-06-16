<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserRole;
use Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
    }

    public function home() {
        $mytime = Carbon\Carbon::now();
        return view('home', ['time' => $mytime->toDateTimeString()]);
    }

    public function register() {
        $mytime = Carbon\Carbon::now();
        return view('register', ['time' => $mytime->toDateTimeString(), 'users' => null, 'user_roles']);
    }

    public function manageUser() {
        $users = User::all();
        $mytime = Carbon\Carbon::now();
        return view('manage-user', ['users' => $users, 'time' => $mytime->toDateTimeString()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $user_roles = UserRole::all();
        return view('add-user', ['user_roles' => $user_roles, 'users' => null]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $request->validate([
            'name' => 'required | max:100',
            'email' => 'required | email | unique:users,email',
            'user_role' => 'required',
            'password' => 'required | alphanum | min:6 |same:confirm_password',
            'confirm_password' => 'required | min:6',
            'gender' => 'required',
            'address' => 'required',
            'dob' => 'required',
            'profile_picture' => 'required | mimes: jpg,png,jpeg'
        ]);

        $image_name = time().$request->name .'.'. $request->profile_picture->extension();
        $image_path = $request->profile_picture->move(public_path('storage'), $image_name);


        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->gender = $request->gender;
        $user->address = $request->address;
        $user->date_of_birth = $request->dob;
        $user->profile_picture = $image_name;
        $user->user_role_id = $request->user_role;

        // dd($user);
        $user->save();
        return redirect('/manage-user');
    }

    public function register_user(Request $request) {
        $request->validate([
            'name' => 'required | max:100',
            'email' => 'required | email | unique:users,email',
            'password' => 'required | alphanum | min:6 |same:confirm_password',
            'confirm_password' => 'required | min:6',
            'gender' => 'required',
            'address' => 'required',
            'dob' => 'required',
            'profile_picture' => 'required | mimes: jpg,png,jpeg'
        ]);

        $image_name = time().$request->name .'.'. $request->profile_picture->extension();
        $image_path = $request->profile_picture->move(public_path('storage'), $image_name);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->gender = $request->gender;
        $user->address = $request->address;
        $user->date_of_birth = $request->dob;
        $user->profile_picture = $image_name;
        $user->user_role_id = 2;

        // dd($user);
        $user->save();
        return redirect('/login');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $users = User::find($id);
        $user_roles = UserRole::all();
        return view('add-user', compact('users'), ['user_roles' => $user_roles]);
    }

    public function editProfile($id) {
        $users = User::find($id);
        $mytime = Carbon\Carbon::now();
        $user_roles = UserRole::all();
        return view('register', compact('users'), ['time' => $mytime->toDateTimeString(), 'user_roles' => $user_roles]);
    }

    public function manageProfile() {
        $users = User::all();
        $mytime = Carbon\Carbon::now();
        return view('manage-profile', ['users' => $users, 'time' => $mytime->toDateTimeString()]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {   
        $request->validate([
            'name' => 'required | max:100',
            'email' => 'required | email | unique:users,email',
            'user_role' => 'required',
            'password' => 'required | alphanum | min:6 |same:confirm_password',
            'confirm_password' => 'required | min:6',
            'gender' => 'required',
            'address' => 'required',
            'dob' => 'required',
            'profile_picture' => 'required | mimes: jpg,png,jpeg'
        ]);
        
        $image_name = time().$request->name .'.'. $request->profile_picture->extension();
        $image_path = $request->profile_picture->move(public_path('storage'), $image_name);
        
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->gender = $request->gender;
        $user->address = $request->address;
        $user->date_of_birth = $request->dob;
        $user->profile_picture = $image_name;
        $user->user_role_id = $request->user_role;
        $user->save();
        return redirect('/');
    }

    public function updateProfile(Request $request, $id) {   
        // dd($request);
        $request->validate([
            'name' => 'required | max:100',
            'email' => 'required | email | unique:users,email',
            'password' => 'required | alphanum | min:6 |same:confirm_password',
            'confirm_password' => 'required | min:6',
            'gender' => 'required',
            'address' => 'required',
            'dob' => 'required',
            'profile_picture' => 'required | mimes: jpg,png,jpeg'
        ]);
        
        $image_name = time().$request->name .'.'. $request->profile_picture->extension();
        $image_path = $request->profile_picture->move(public_path('storage'), $image_name);
        
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->gender = $request->gender;
        $user->address = $request->address;
        $user->date_of_birth = $request->dob;
        $user->profile_picture = $image_name;
        $user->save();
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $user = User::find($id);
        $user->delete();
        return redirect('/manage-user');
    }
}
