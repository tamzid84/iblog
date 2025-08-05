<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PageController;

Route::get('/', [PageController::class, 'index']);
Route::get('/categories', [PageController::class, 'categories']);
Route::get('/profile', [PageController::class, 'profile']);
Route::get('/login', [PageController::class, 'login']);
Route::get('/register', [PageController::class, 'registerPage']);
Route::get('/single-blog', [PageController::class, 'singleBlog']);
Route::get('/welcome', [PageController::class, 'welcome']);
Route::post('/register', [PageController::class, 'registerSubmit'])->name('register.submit');

Route::post('/login', [PageController::class, 'loginSubmit'])->name('login.submit');
Route::get('/logout', [PageController::class, 'logout'])->name('logout');

// Route::get('/', function () {
//     return view('index');
// });
// Route::get('/categories', function () {
//     return view('categories');
// });
// Route::get('/profile', function () {
//     return view('profile');
// });
// Route::get('/login', function () {
//     return view('login');
// });
// Route::get('/register', function () {
//     return view('register');
// });
// Route::get('/single-blog', function () {
//     return view('single-blog');
// });

// Route::view('/', 'index');
// Route::view('/categories', 'categories');
// Route::view('/profile', 'profile');
// Route::view('/login', 'login');
// Route::view('/register', 'register');
// Route::view('/single-blog', 'single-blog');