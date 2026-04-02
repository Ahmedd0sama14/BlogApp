<?php
require __DIR__.'/auth.php';
require __DIR__.'/AllBlogsRouts/blogs.php';
require __DIR__.'/AllBlogsRouts/ContactUs.php';
require __DIR__.'/AllBlogsRouts/Comments.php';

use App\Http\Controllers\BlogController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\ThemController;
use Illuminate\Support\Facades\Route;

Route::controller(ThemController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/category/{id}', 'category')->name('category');
});

/* Subscriber Routes */
Route::post('/subscribers', [SubscriberController::class, 'store'])->name('subscribers');
