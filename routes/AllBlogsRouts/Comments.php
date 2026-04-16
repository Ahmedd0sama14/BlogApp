<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;


/* comment Routes */
Route::middleware('auth')->group(function () {
 Route::post('/comments/{blog}', [CommentController::class, 'storeComment'])->name('comments.store');
 Route::delete('/comments/{id}/delete', [CommentController::class, 'deleteComment'])->name('comments.delete');
 Route::put('/comments/{id}/update', [CommentController::class, 'updateComment'])->name('comments.update');
});
