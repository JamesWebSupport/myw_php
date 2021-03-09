<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\blog\CommentController;
use App\Http\Controllers\Blog\LikeController;
use App\Http\Controllers\Blog\PostController;
use App\Http\Controllers\Blog\SubjectController;
use App\Http\Controllers\blog\TagController;
use App\Http\Controllers\CKEditorController;
use App\Http\Controllers\DashboardController;

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
//Home Page and static Pages
// Route::get('/', function () {return view('home');})->name('home');
// Route::get('/home', function () {return view('home');});

Route::get('/aboutme', function() {return view('aboutme');})->name('aboutme');
Route::get('/contactme', function() {return view('contactme');})->name('contactme');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')
->name('dashboard');

//Auth: login, logout, register, change password, profile
Route::get('/register',[RegisterController::class, 'index'])->name('register');
Route::post('/register',[RegisterController::class, 'store']);

Route::get('/login',[LoginController::class, 'index'])->name('login');
Route::post('/login',[LoginController::class, 'store']);

Route::get('/logout',[LogoutController::class, 'store'])->name('logout');

// Post
Route::get('/post/index',[PostController::class, 'index'])->name('list_post');

Route::get('/post/create',[PostController::class, 'create'])->name('create_post');
Route::post('/post/create',[PostController::class, 'store']);

Route::get('/post/{id}/show', [PostController::class, 'show'])->name('show_post');


Route::get('/post/{id}/edit', [PostController::class, 'edit'])->name('edit_post');
Route::post('/post/{id}/edit', [PostController::class, 'update'])->name('uptate_post');

Route::get('/post/{id}/delete', [PostController::class, 'destroy'])->name('delete_post');

//Route::get('/post/{id}/like',[LikeController::class, 'likePost']);
//Route::post('/post/{id}/like/',[LikeController::class, 'likePost'])->name('like_post');

// Subject
Route::get('/subject/index',[SubjectController::class, 'index'])->name('list_subject');

Route::get('/subject/create',[SubjectController::class, 'create'])->name(('create_subject'));
Route::post('/subject/create',[SubjectController::class, 'store']);

Route::get('/subject/{id}/show/',[SubjectController::class, 'show'])->name(('show_subject'));

Route::get('/subject/edit/{id}', [SubjectController::class, 'edit'])->name('edit_subject');
Route::Post('/subject/edit/{id}', [SubjectController::class, 'update'])->name('update_subject');

// Comment
Route::get('/comment/index',[CommentController::class, 'index'])->name('list_comment');

Route::get('/comment/{type}/{id}/create',[CommentController::class, 'create'])->name('create_comment');
Route::post('/comment/{type}/{id}/create',[CommentController::class, 'store']);

Route::get('/comment/{id}/show', [CommentController::class, 'show'])->name('show_comment');

Route::get('/comment/{id}/edit', [CommentController::class, 'edit'])->name('edit_comment');
Route::put('/comment/{id}/edit', [CommentController::class, 'update'])->name('uptate_comment');

Route::get('/comment/{id}/delete', [CommentController::class, 'destroy'])->name('delete_comment');

//Route::get('/comment/{id}/like' ,[LikeController::class, 'likeComment'])->name('like_comment');
// tags
//
Route::get('/tag/{type}/{id}/create', [TagController::class, 'create'])->name('create_tag');
Route::post('/tag/{type}/{id}/create', [TagController::class, 'store']);

Route::get('/tag/{id}/index', [TagController::class, 'indexByTag'])->name('show_by_tag');

Route::get('tag/{type}/{id}/choose', [TagController::class, 'chooseOrCreate'])->name('choose_create_tags');
Route::post('tag/{type}/{id}/choose', [TagController::class, 'attach']);

Route::get('tag/{type}/{id}/remove', [TagController::class, 'remove'])->name('remove_tags');
Route::post('tag/{type}/{id}/remove', [TagController::class, 'detach']);

Route::get('tag/index', [TagController::class, 'index'])->name('show_all_tags');

//Like
Route::get('/{type}/{id}/like',[LikeController::class, 'likeAction']);
Route::post('/{type}/{id}/like/',[LikeController::class, 'LikeAction'])->name('like');


#Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('ckeditor/upload', 'CKEditorController@upload')->name('ckeditor.image-upload');
