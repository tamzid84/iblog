<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PageController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PostShowController;
use App\Models\Category;            
use App\Models\Post;

Route::get('/', [BlogController::class, 'home'])->name('home');
Route::get('/categories', [PageController::class, 'categories']);
Route::get('/profile', [PageController::class, 'profile']);
Route::get('/login', [PageController::class, 'login']);
Route::get('/register', [PageController::class, 'registerPage']);
Route::get('/single-blog', [PageController::class, 'singleBlog']);
Route::get('/welcome', [PageController::class, 'welcome']);
Route::post('/register', [PageController::class, 'registerSubmit'])->name('register.submit');

Route::post('/login', [PageController::class, 'loginSubmit'])->name('login.submit');
Route::get('/logout', [PageController::class, 'logout'])->name('logout');

Route::get('/admin/dashboard', fn () => view('admin.dashboard'))->name('admin.dashboard');

Route::prefix('admin')->group(function () {
    Route::resource('categories', CategoryController::class);
    Route::resource('posts', PostController::class);
});



Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');


Route::get('/post/{post:slug}', PostShowController::class)->name('post.show');

// already had single post:
//Route::get('/post/{post:slug}', fn(\App\Models\Post $post) => view('blog.show', compact('post')))->name('post.show');
// Route::get('/blog', function () {
//     $categories = \App\Models\Category::with(['posts'=>fn($q)=>$q->latest()])->orderBy('name')->get();
//     return view('blog.index', compact('categories'));
// });

// Route::get('/post/{post:slug}', function (\App\Models\Post $post) {
//     return view('blog.show', compact('post'));
// });




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


