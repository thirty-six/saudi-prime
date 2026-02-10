<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\eveningRegisterController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\kidsRegisterController;
use App\Http\Controllers\ProgramsController;
use App\Http\Controllers\morningRegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/register', function () {
    return view('register');
})->name('subscriptions.register');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact_us',[FaqController::class, 'index'])->name('contact_us');

Route::get('/programs', function () {
    return view('programs');
})->name('programs');

Route::get('/login', function () {
    return view('login');
});
Route::get('/', [ProgramsController::class, 'index'])->name('home');

Route::post('/contact', [ContactController::class,'send'])->name('contact.send');

Route::get('/subscriptions', function () {
    return view('subscriptions');
})->name('subscriptions');

Route::get('/playground', function () {
    return view('playground');
})->name('playground');


Route::get('/morning-registration', [morningRegisterController::class, 'index'])
    ->name('morning_register');

Route::post('/morning-registration', [morningRegisterController::class, 'store'])
    ->name('morning_register.store');

Route::get('/evening-registration', [eveningRegisterController::class, 'index'])
    ->name('evening_register');

Route::post('/evening-registration', [eveningRegisterController::class, 'store'])
    ->name('evening_register.store');

Route::get('/kids-registration', [kidsRegisterController::class, 'index'])->name('kids_register');
Route::post('/kids-registration', [kidsRegisterController::class, 'store'])->name('kids_register.store');