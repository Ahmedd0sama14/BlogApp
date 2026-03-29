<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::controller(ContactController::class)->group(function () {
    Route::get('/ContactUs', 'view')->name('ContactUs');
    Route::post('/contacts', 'store')->name('contacts');
});
