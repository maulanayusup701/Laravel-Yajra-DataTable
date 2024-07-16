<?php

use App\Http\Controllers\DataUserController;
use Illuminate\Support\Facades\Route;

Route::controller(DataUserController::class)->group(function () {
    Route::get('/', 'index')->name('home');
});
