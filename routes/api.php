<?php

use App\Http\Controllers\F2\TriageIgdController;
use App\Http\Controllers\f8\ResumeController;
use App\Http\Controllers\f8\ResumeTerapiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/triageigd-simpan-terapi',[TriageIgdController::class,'simpanTerapi']);
// F8.1 Resume Medis -> Terapi Obat 
Route::get('/fetch-obat',[ResumeController::class,'fetchData']);
Route::post('/simpan-terapi-obat-resume',[ResumeController::class,'simpanObat']);
Route::get('/edit-terapi-obat-resume/{id}',[ResumeController::class,'editObat']);
Route::put('/update-terapi-obat-resume/{id}',[ResumeController::class,'updateObat']);
Route::delete('/delete-terapi-obat-resume/{id}',[ResumeController::class,'destroy']);

Route::get('/fetch-diagnosa',[ResumeController::class,'fetchDataDiagnosa']);
Route::post('/simpan-diagnosa',[ResumeController::class,'simpanDiagnosa']);
