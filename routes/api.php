<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\DokterController;
use App\Http\Controllers\API\KlinikController;
use App\Http\Controllers\API\RelasiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::apiResource('dokter', DokterController::class);
Route::apiResource('klinik', KlinikController::class);
Route::apiResource('relasi', RelasiController::class);
