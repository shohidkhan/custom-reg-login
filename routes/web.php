<?php

use App\Http\Controllers\UserController;
use App\Http\Middleware\TokenVerificationMiddleware;
use App\Models\User;
use Illuminate\Support\Facades\Route;

//views
Route::view("/registration","pages.auth.registration-page");
Route::view("/login","pages.auth.login-page");
Route::view("/profile","pages.dashboard.profile-page")->middleware([TokenVerificationMiddleware::class]);

//Route for backend
Route::post("/userRegistration",[UserController::class,"userRegistration"]);
Route::post("/userLogin",[UserController::class,"userLogin"]);
Route::get("/userDetails",[UserController::class,"userDetails"])->middleware([TokenVerificationMiddleware::class]);
Route::get("/logout",[UserController::class,"logout"])->name("logout");