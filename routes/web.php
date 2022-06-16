<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\InboxController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'admin-login'], function() {
    // Book Routes
    Route::get('/add-book', [BookController::class, 'create']);
    Route::post('/add-book', [BookController::class, 'store']);

    Route::get('/manage-book', [BookController::class, 'manageBook']);

    Route::get('/delete-book/{id}', [BookController::class, 'destroy']);
    Route::get('/update-book/{id}', [BookController::class, 'edit']);
    Route::post('/update-book/{id}', [BookController::class, 'update']);

    // Genre Routes
    Route::get('/manage-genre', [GenreController::class, 'manageGenre']);
    Route::get('/add-genre', [GenreController::class, 'create']);
    Route::post('/add-genre', [GenreController::class, 'store']);

    Route::get('/delete-genre/{id}', [GenreController::class, 'destroy']);
    Route::get('/update-genre/{id}', [GenreController::class, 'edit']);
    Route::post('/update-genre/{id}', [GenreController::class, 'update']);

    // User Route
    Route::get('/add-user', [UserController::class, 'create']);
    Route::post('/add-user', [UserController::class, 'store']);

    Route::get('/delete-user/{id}', [UserController::class, 'destroy']);
    Route::get('/update-user/{id}', [UserController::class, 'edit']);
    Route::post('/update-user/{id}', [UserController::class, 'update']);
    

    Route::get('/manage-user', [UserController::class, 'manageUser']);

    // manage profile
    Route::get('/manage-profile', [UserController::class, 'manageProfile']);
    Route::get('/update-profile/{id}', [UserController::class, 'editProfile']);
    Route::post('/update-profile/{id}', [UserController::class, 'updateProfile']);
});


Route::group(['middleware' => 'user-login'], function() {
    // manage profile
    Route::get('/manage-profile', [UserController::class, 'manageProfile']);
    Route::get('/update-profile/{id}', [UserController::class, 'editProfile']);
    Route::post('/update-profile/{id}', [UserController::class, 'updateProfile']);
});

Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/', [BookController::class, 'index']);
Route::post('/search', [BookController::class, 'search']);
Route::get('/books-detail/{id}', [BookController::class, 'bookDetail']);

// Login
Route::get('/login', [LoginController::class, 'login']);
Route::post('/login', [LoginController::class, 'auth']);


// Register
Route::get('/register', [UserController::class, 'register']);
Route::post('/register', [UserController::class, 'register_user']);
