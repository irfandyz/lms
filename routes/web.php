<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LectureController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\TaskController;

Route::controller(AuthController::class)->group(function () {
    Route::get('/', 'signIn');
    Route::get('/sign-in', 'signIn');
    Route::post('/sign-in', 'login');
    Route::get('/sign-up', 'signUp');
    Route::post('/sign-up', 'store');
    Route::get('/logout', 'logout');
});

Route::middleware('member')->group(function () {
    Route::controller(MemberController::class)->group(function () {
        Route::get('user/dashboard', 'dashboard');
        Route::get('user/lecture', 'index');
        Route::get('user/lecture/explore', 'explore');
    });
});
Route::middleware('administrator')->group(function () {
    Route::controller(AdministratorController::class)->group(function () {
        Route::get('administrator/dashboard', 'dashboard');
        Route::get('administrator/lecture', 'lecture');
        Route::get('administrator/lecture/create', 'create');
        Route::get('administrator/lecture/lesson', 'lesson');
    });
});
Route::controller(LectureController::class)->group(function () {
    Route::post('lecture/create', 'create');
});
Route::controller(LessonController::class)->group(function () {
    Route::post('lesson/create', 'create');
});
