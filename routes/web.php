<?php

use App\Http\Controllers\ProtectionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::post('/', ProtectionController::class)->name('protected.altitude');
