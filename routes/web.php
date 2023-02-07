<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PostCreateController;
use App\Http\Controllers\UpdateProfileController;
use App\Http\Controllers\ExploreController;


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

Route::get('/login', function(){
    return view('login', [
        'title' => 'BetaApps | Get Started'
    ]);
})->name('login');

Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/register', function(){
    return view('register', [
        'title' => 'BetaApps | Daftar Akun'
    ]);
});

Route::post('/register', [RegisterController::class, 'store']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/home', [PostController::class, 'index'])->middleware('auth');

// Post Detail
Route::get('/detail/{post:id}', [PostController::class, 'show'])->middleware('auth');

// Main Comments
Route::post('/home/{post:id}', [PostController::class, 'postkomentar'])->middleware('auth');

// Post Resource Controller
Route::resource('/post', PostCreateController::class)->middleware('auth');

// Update Profile Controller
Route::prefix('users')->group(function(){

    Route::get('edit', [UpdateProfileController::class, 'edit'])->name('users.edit');

    Route::put('update', [UpdateProfileController::class, 'update'])->name('users.update');
})->middleware('auth');

// Explore Controller
Route::get('explore', [ExploreController::class, 'index'])->middleware('auth');

// undefined features
Route::get('/chat', [ExploreController::class, 'chat'])->middleware('auth');

Route::get('/notification', [ExploreController::class, 'notification'])->middleware('auth');


Route::get('/account/{user:id}', [PostController::class, 'showProfileFromPost'])->middleware('auth');


