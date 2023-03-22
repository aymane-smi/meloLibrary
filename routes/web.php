<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\Authentification;
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
Route::prefix("/")->group(function(){
    Route::get("/register", [Authentification::class, "register"]);
    Route::post("/register", [Authentification::class, "registerPost"]);
});
Route::prefix("Dashboard")->group(function () {
    Route::get("/", [adminController::class, 'index']);
    Route::get("/artists", [adminController::class, "showArtists"]);
    Route::delete("/delete/{id}", [adminController::class, "deleteArtist"]);
    Route::get("/categories", [adminController::class, "showCategories"]);
    Route::delete("/deleteCategory/{id}", [adminController::class, "deleteCategory"]);
});
