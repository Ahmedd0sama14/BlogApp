<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::middleware('admin')->controller(AdminController::class)->prefix('admin')->group(function () {
    Route::get('/',  'index')->name('admin.index');
    Route::get('/comments', 'comments')->name('admin.comments');
});
Route::middleware('admin')->prefix('admin')->group(function () {
    Route::resource('categories', CategoryController::class);
});
