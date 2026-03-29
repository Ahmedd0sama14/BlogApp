<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

Route::resource('blogs', BlogController::class)->except(['index']);
Route::get('blogs.user',[BlogController::class,'userBlogs'])->name('blogs.user');
