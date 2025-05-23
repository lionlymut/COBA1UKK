<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIGuruController;
use App\Http\Controllers\APIIndustriController;
use App\Http\Controllers\APISiswaController;
use App\Http\Controllers\APIPklController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiresource("guru", APIGuruController::class);  //mengarahkan ke APIGuruController
Route::apiresource("industri", APIIndustriController::class);  //mengarahkan ke APIIndistriController
Route::apiresource("siswa", APISiswaController::class);  //mengarahkan ke APIIndistriController
Route::apiresource("pkl", APIPklController::class);  //mengarahkan ke APIIndistriController
