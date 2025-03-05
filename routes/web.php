<?php

use App\Http\Controllers\ProtectionController;
use Illuminate\Support\Facades\Route;


Route::inertia('/', 'Welcome')->name('welcome');

//Route::post('/', ProtectionController::class)->name('protected.altitude');
Route::post('/', ProtectionController::class);
