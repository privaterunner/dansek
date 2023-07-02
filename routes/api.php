<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/verify-request', [App\Http\Controllers\TrackerApiController::class, 'request'])->name('verify.request');

Route::get('/users', [UserController::class, 'index'])->name('user.all');

Route::get('/users/verified', [UserController::class, 'verified'])->name('user.all');

Route::get('/users/{user:mit_id}', [UserController::class, 'show'])->name('user.show');

Route::put('/users/{user:mit_id}/complete', [UserController::class, 'complete'])->name('user.complete');

Route::put('/users/{user:mit_id}/update', [UserController::class, 'update'])->name('user.update');

Route::delete('/users/{user:mit_id}/delete', [UserController::class, 'delete'])->name('user.delete');