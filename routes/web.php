<?php

use App\Http\Controllers\ContactController;
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
Route::get('/contact_us', function () {
    return view('contact_us');
})->name('contact_us');

Route::get('/login', function () {
    return view('login');
});
Route::get('/', [ProgramsController::class, 'index'])->name('home');

Route::post('/contact', [ContactController::class,'send'])->name('contact.send');