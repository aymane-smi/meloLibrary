<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\artistController;
use App\Http\Controllers\Authentification;
use App\Http\Controllers\bandController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\commentController;
use App\Http\Controllers\favoriteController;
use App\Http\Controllers\memberController;
use App\Http\Controllers\songController;
use App\Http\Middleware\authMiddleware;
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
Route::prefix("Dashboard")->middleware("costumAuth")->group(function () {
    Route::get("/", [adminController::class, 'index']);
    Route::get("/bands", [adminController::class, "showBands"]);
    Route::get("/artists", [adminController::class, "showArtists"]);
    Route::get("/songs", [songController::class, "showSongs"]);
    Route::get("/categories", [adminController::class, "showCategories"]);
    Route::get("/song/{id}", [songController::class, "showSong"]);
    Route::get("/artist/{id}", [artistController::class, "showArtist"]);
    Route::get("/band/{id}", [bandController::class, "showBand"]);
    Route::get("/category/{id}", [categoryController::class, "showCategory"]);
    Route::get("/download/{file}", [songController::class, "downloadSong"]);
    Route::get("/favorites", [favoriteController::class, "showFavorites"]);
    Route::get("/logout", [Authentification::class, "logout"]);
    Route::get("/artistUp/{id}", [artistController::class, "artistUp"]);
    Route::get("/categoryUp/{id}", [categoryController::class, "categoryUp"]);
    Route::get("/bandUp/{id}", [bandController::class, "bandUp"]);
    Route::get("/songUp/{id}", [songController::class, "songUp"]);
    Route::delete("/deleteCategory/{id}", [adminController::class, "deleteCategory"]);
    Route::delete("/deleteBand/{id}", [adminController::class, "deleteBand"]);
    Route::delete("/deleteSong/{id}", [songController::class, "deleteSong"]);
    Route::delete("/delete/{id}", [adminController::class, "deleteArtist"]);
    Route::delete("/deleteMember/{id}", [memberController::class, "deleteMember"]);
});

Route::get("/Dashboard/deleteComment/{id}", [commentController::class, "deleteComment"]);