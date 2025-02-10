<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\v1\BookController;
use App\Http\Controllers\Api\v1\AuthorController;
use App\Http\Controllers\Api\v1\PublisherController;

Route::middleware('auth:api')->group(function () {
    Route::resource('/books', BookController::class);
    Route::resource('/authors', AuthorController::class)->only(['index', 'show']);
    Route::resource('/publishers', PublisherController::class)->only(['index', 'show']);
});

Route::get('/')->name('login');
