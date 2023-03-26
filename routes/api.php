<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\bandController;
use App\Http\Controllers\songController;
use App\Http\Controllers\utilityController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post("/addArtist", [adminController::class, "addArtist"]);
Route::get("/getBand/{id}", [adminController::class, "getBand"]);
Route::get("/getArtist/{id}", [adminController::class, "getArtist"]);
Route::get("/getCategory/{id}", [adminController::class, "showCategory"]);
Route::get("/randomColor", [utilityController::class, "randomColor"]);
Route::post("/updateArtist", [adminController::class, "updateArtist"]);
Route::post("/updateCategory", [adminController::class, "updateCategory"]);
Route::post("/addCategory", [adminController::class, "addCatgeory"]);
Route::post("/addBand", [adminController::class, "addBand"]);
Route::post("/updateBand", [adminController::class, "updateBand"]);
Route::post("/addMember", [bandController::class, "addMember"]);
Route::post("/addSong", [songController::class, "addSong"]);