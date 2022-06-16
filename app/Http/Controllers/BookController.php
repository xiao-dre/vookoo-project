<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Book;
use App\Models\User;
use App\Models\Comment;
use Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function search(Request $request) {
        $input = $request->search;
        $books = Book::where('title', 'like', '%'.$input.'%')->simplePaginate(3);
        return view('home', compact('books'));
    }

    public function index() {
        $books = Book::simplePaginate(3);
        return view('home', ['books' => $books, 'count' => 1]);
    }

    public function manageBook() {
        $books = Book::all();
        return view('manage-book', ['books' => $books]);
    }

    public function bookDetail($id) {
        $books = Book::find($id);
        // dd($books);
        return view('book-detail', ['books' => $books, 'count' => 1]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $genres = Genre::all();
        return view('add-book', ['genres' => $genres, 'books' => null]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        // Validate
        $request->validate([
            'book_title' => 'required',
            'book_genre' => 'required',
            'book_description' => 'required',
            'book_cover'=> 'required | mimes: jpg,png,jpeg'
        ]);

        $image_name = time().$request->name .'.'. $request->book_cover->extension();
        $image_path = $request->book_cover->move(public_path('storage'), $image_name);

        $book = new Book();

        $book->title = $request->book_title;
        $book->genre_id = $request->book_genre;
        $book->description = $request->book_description;
        $book->image = $image_name;
        $book->save();
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $books = Book::find($id);
        $genres = Genre::all();
        return view('add-book', compact('books'), ['genres' => $genres]);
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
            'book_title' => 'required',
            'book_genre' => 'required',
            'book_description' => 'required',
            'book_cover'=> 'required | mimes: jpg,png,jpeg'
        ]);

        $image_name = time().$request->name .'.'. $request->book_cover->extension();
        $image_path = $request->book_cover->move(public_path('storage'), $image_name);
        // dd($image_path);
        // Update Data
        $book = Book::find($id);

        $book->title = $request->book_title;
        $book->genre_id = $request->book_genre;
        $book->description = $request->book_description;
        $book->image = $image_name;
        $book->save();
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
       $book = Book::find($id);
       // Delete the data
       $book->delete();

       return redirect('/');
    }
}
