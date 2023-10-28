<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;

Route::controller(AuthController::class)->group(function () {
    Route::get('/', 'signIn');
    Route::get('/sign-in', 'signIn');
    Route::post('/sign-in', 'login');
    Route::get('/sign-up', 'signUp');
    Route::post('/sign-up', 'store');
});

Route::middleware(['auth'])->group(function () {
    Route::controller(TaskController::class)->group(function () {
        Route::get('/user/dashboard', 'index');
        Route::get('/user/task', 'show');
        Route::get('/user/task/create', 'create');
        Route::get('/user/task/update/{id}', 'update');
        
        Route::get('/user/task/get', 'get');
        Route::post('/user/task/edit', 'edit');
        Route::put('/user/task/delete', 'delete');
        Route::post('/user/task/store', 'store');
        Route::put('/user/task/status', 'status');
    });
});
