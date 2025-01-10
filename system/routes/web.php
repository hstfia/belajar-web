<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;



Route::prefix('admin')->group(function () {
    include '_route/admin.php';
});
Route::prefix('user')->group(function () {
    include '_route/user.php';
});

Route::controller(AuthController::class)->group(function () {
    Route::get('/', 'halamanLogin');
    Route::get('login', 'halamanLogin');
    Route::post('login', 'prosesLogin');
});
