<?php

use Illuminate\Support\Facades\Route;



Route::prefix('admin')->group(function () {
    include '_route/admin.php';
});
Route::prefix('user')->group(function () {
    include '_route/user.php';
});



