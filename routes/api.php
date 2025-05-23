<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIGuruController;
use App\Http\Controllers\APIIndustriController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiresource("guru", APIGuruController::class);  //mengarahkan ke APIGuruController
Route::apiresource("industri", APIIndustriController::class);  //mengarahkan ke APIGuruController
