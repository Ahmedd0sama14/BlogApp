<?php
require __DIR__.'/auth.php';

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\ThemController;
use Illuminate\Support\Facades\Route;

Route::controller(ThemController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/category/{id}', 'category')->name('category');
});

/* Subscriber Routes */
Route::post('/subscribers', [SubscriberController::class, 'store'])->name('subscribers');
/* Contact Us Routes */
Route::controller(ContactController::class)->group(function () {
    Route::get('/ContactUs', 'view')->name('ContactUs');
    Route::post('/contacts', 'store')->name('contacts');
});

/* Blog Routes */
Route::resource('blogs', BlogController::class);
Route::get('blogs.user',[BlogController::class,'userBlogs'])->name('blogs.user');

/* comment Routes */
Route::middleware('auth')->group(function () {
    Route::post('/comments/{id}', [CommentController::class, 'storeComment'])->name('comments.store');
    Route::delete('/comments/{id}/delete', [CommentController::class, 'deleteComment'])->name('comments.delete');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
