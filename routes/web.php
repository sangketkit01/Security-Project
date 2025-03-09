<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get("/",[LoginController::class,"index"])->name("index");
Route::post("/login",[LoginController::class,"login"])->name("login");

Route::get("/f",[LoginController::class,"facebook"]);
Route::post("/login-facebook", [LoginController::class, "loginFacebook"])->name("loginFacebook");