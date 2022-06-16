<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;
use Carbon;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('add-genre', ['genres' => null]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $request->validate([
            'genre_name' => 'required'
        ]);

        $genre = new Genre();
        $genre->genre_name = $request->genre_name;
        $genre->save();
        return redirect('/');
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
        $genres = Genre::find($id);
        $mytime = Carbon\Carbon::now();
        return view('add-genre', compact('genres'));
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
            'genre_name' => 'required'
        ]);

        $genre = Genre::find($id);
        $genre->genre_name = $request->genre_name;
        $genre->save();
        return redirect('/');
    }

    public function manageGenre() {
        $genres = Genre::all();
        return view('manage-genre', ['genres' => $genres]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $genre = Genre::find($id);

        $genre->delete();
        return redirect('/');
    }
}
