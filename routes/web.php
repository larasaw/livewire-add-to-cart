<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\EmailController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/hello', function () {
    return view('index');
})->name('index');

Route::get('/cart/index', [ArticleController::class, 'index'])->name('cart.index');
Route::get('/send', [EmailController::class, 'sendEmail'])->name('sendemail');
