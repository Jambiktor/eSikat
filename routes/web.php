<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DiaryController;
use Illuminate\Support\Facades\Route;

Route::get('/layout', function () {
    return view('layout.landing');
})->name('layout.landing');

Route::get("/login", [AuthController::class, "login"])->name('login');
Route::post("/login", [AuthController::class, "loginPost"])->name('login.post');
Route::get("/registration", [AuthController::class, "registration"])->name('registration');
Route::post("/registration", [AuthController::class, "registrationPost"])->name('registration.post');
Route::get("/logout", [AuthController::class, "logout"])->name('logout');


Route::get("/diary", [DiaryController::class, "diary"])->name('diary');
Route::post("/diary", [DiaryController::class, "diaryPost"])->name('diary.post');
Route::get("/diary/{notion}/edit", [DiaryController::class, "edit"])->name('layout.edit');
Route::put("/diary/{notion}/update", [DiaryController::class, "update"])->name('layout.update');