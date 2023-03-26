<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\Authentification;
use App\Http\Controllers\songController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get("/", [Authentification::class, "login"]);
Route::prefix("/")->group(function(){
    Route::get("/register", [Authentification::class, "register"]);
    Route::post("/register", [Authentification::class, "registerPost"]);
    Route::post("/login", [Authentification::class, "loginPost"]);
});
Route::prefix("Dashboard")->group(function () {
    Route::get("/", [adminController::class, 'index']);
    Route::get("/bands", [adminController::class, "showBands"]);
    Route::get("/artists", [adminController::class, "showArtists"]);
    Route::get("/songs", [songController::class, "showSongs"]);
    Route::get("/categories", [adminController::class, "showCategories"]);
    Route::get("/song/{id}", [songController::class, "showSong"]);
    Route::delete("/deleteCategory/{id}", [adminController::class, "deleteCategory"]);
    Route::delete("/deleteBand/{id}", [adminController::class, "deleteBand"]);
    Route::delete("/deleteSong/{id}", [songController::class, "deleteSong"]);
    Route::delete("/delete/{id}", [adminController::class, "deleteArtist"]);
});
