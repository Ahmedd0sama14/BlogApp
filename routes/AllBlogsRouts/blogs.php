<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

Route::resource('blogs', BlogController::class)->except(['index']);
Route::get('blogs.user', [BlogController::class, 'userBlogs'])->name('blogs.user');
Route::post('/blogs/{blog}/like', [BlogController::class, 'like'])->name('blogs.like');
Route::get('/blogs.search', [BlogController::class, 'search'])->name('blogs.search');
Route::get('/blogs/category/{id}', [BlogController::class, 'search'])->name('category.search');
