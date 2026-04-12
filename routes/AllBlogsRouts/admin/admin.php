<?php

use App\Http\Controllers\Admin\BlogsController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::middleware('admin')->controller(AdminController::class)->prefix('admin')->group(function () {
    Route::get('/',  'index')->name('admin.index');
    Route::get('/comments', 'comments')->name('admin.comments');
    Route::delete('/comments/{comment}/delete', 'deleteComment')->name('admin.comments.delete');
});
/* Admin Category Routes */
Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
    Route::resource('categories', CategoryController::class);
});

/* Admin Blog Routes */
Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
    Route::resource('users', UserController::class);
});

/* Admin Blog Routes */
Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
    Route::resource('blogs', BlogsController::class)->only(['index', 'show','destroy']);
});