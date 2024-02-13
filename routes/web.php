<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::post('/posts', 'PostController@store');
Route::post('/posts/{id}/like', 'LikeController@like');
Route::post('/posts/{id}/comment', 'CommentController@comment');
Route::delete('/posts/{id}', 'PostController@destroy');

Route::post('/posts', 'PostController@store');
Route::delete('/posts/{id}', 'PostController@destroy');
Route::post('/posts/{id}/like', 'LikeController@like');
Route::post('/posts/{id}/comment', 'CommentController@comment');
Route::resource('posts', PostController::class);


Route::post('/posts/{id}/like', [PostController::class, 'like'])->name('posts.like');
Route::post('/posts/{id}/comment', [PostController::class, 'comment'])->name('posts.comment');

Route::resource('posts', PostController::class)->except('create', 'edit');

Route::post('/posts/{id}/like', [PostController::class, 'like'])->name('posts.like');
Route::post('/posts/{id}/unlike', [PostController::class, 'unlike'])->name('posts.unlike');
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
Route::get('/users', [UserController::class, 'index'])->name('users.index');
