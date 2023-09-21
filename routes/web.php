<?php

use App\Http\Controllers\AdminBlogController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BlogController::class, 'index']);
Route::get('/blogs/{blog:slug}', [BlogController::class, 'show']);

Route::post('/blogs/{blog:slug}/comments', [CommentController::class, 'store']);

Route::get('/register', [AuthController::class, 'create'])->middleware('guest');
Route::post('/register', [AuthController::class, 'store'])->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::get('/login', [AuthController::class, 'login'])->middleware('guest');
Route::post('/login', [AuthController::class, 'post_login'])->middleware('guest');

Route::post('/blogs/{blog:slug}/subscription', [BlogController::class, 'subscriptionHandler']);

//admin

Route::middleware('can:admin')->group(function () {
    //blogs
    Route::get('/admin/blogs', [AdminBlogController::class, 'index']);
    Route::get('/admin/blogs/create', [AdminBlogController::class, 'create']);
    Route::post('/admin/blogs/store', [AdminBlogController::class, 'store']);
    Route::delete('/admin/blogs/{blog:slug}/delete', [AdminBlogController::class, 'destory']);

    Route::get('/admin/blogs/{blog:slug}/edit', [AdminBlogController::class, 'edit']);
    Route::patch('/admin/blogs/{blog:slug}/update', [AdminBlogController::class, 'update']);

    //users
    Route::get('/admin/users', [AdminUserController::class, 'index']);
    Route::delete('/admin/users/{user:username}/delete', [AdminUserController::class, 'destory']);
    Route::get('/admin/users/{user:username}/edit', [AdminUserController::class, 'edit']);
    Route::patch('/admin/users/{user:username}/update', [AdminUserController::class, 'update']);

});

//all -> index -> blogs.index
//single -> show -> blogs.show
//form -> create -> blogs.create
//server store -> store -> -
//edit form -> edit -> blogs.edit
//server update -> update  -> -
//server delete -> destory -> -

//studentController
//all -> index -> students.index
//single -> show -> students.show
//form -> create -> students.create
//server store -> store -> -
//edit form -> edit -> students.edit
//server update -> update  -> -
//server delete -> destory -> -
