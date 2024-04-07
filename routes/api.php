<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PatientsController;
use App\Http\Controllers\Api\DiagnosePatientController;
use App\Http\Controllers\Api\DiagnosesController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('patients', PatientsController::class);
Route::apiResource('diagnose', DiagnosePatientController::class);
Route::post('/patients/filter/', [PatientsController::class, 'searchByData']);
Route::get('/get_common_diagnoses', [DiagnosesController::class, 'get5CommonDiagnoses']);