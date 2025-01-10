<?php

use App\Http\Controllers\admin\AlatController as AdminAlatController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PenggunaController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AlatController;
use Illuminate\Support\Facades\Route;


Route::prefix('dashboard')->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/loadMarker', 'index');
    });
});
Route::prefix('/data-pengguna')->group(function () {
    Route::controller(PenggunaController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/create', 'create');
        Route::post('/store', 'store');
        Route::get('/edit/{pengguna}', 'edit');
        Route::put('/update/{pengguna}', 'update');
        Route::get('/detail/{pengguna}', 'detail');
        Route::get('/delete/{pengguna}', 'destroy');
    });

    Route::get('/dashboard/stream-emergency-events', [DashboardController::class, 'streamEmergencyEvents']);
});
Route::prefix('/data-alat')->group(function () {
    Route::controller(AdminAlatController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/create', 'create');
        Route::post('/store', 'store');
        Route::get('/edit/{alat}', 'edit');
        Route::put('/update/{alat}', 'update');
        Route::get('/detail/{alat}', 'detail');
        Route::get('/delete/{alat}', 'destroy');
    });

    Route::get('/dashboard/stream-emergency-events', [DashboardController::class, 'streamEmergencyEvents']);
});
