<?php

use App\Http\Controllers\adminController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix("Dashboard")->group(function () {
    Route::get("/", [adminController::class, 'index']);
    Route::get("/artists", [adminController::class, "showArtists"]);
    Route::post("/addArtist", [adminController::class, "addArtist"]);
});
