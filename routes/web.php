<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
/* hola */
Route::resource('movies', App\Http\Controllers\MovieController::class);
