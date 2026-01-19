<?php

use App\Http\Controllers\ProgramsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/about', function () {
    return view('about');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/', [ProgramsController::class, 'index'])->name('home');