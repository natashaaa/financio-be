<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecordController;


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

Route::get('/index/record', [RecordController::class, 'index']);
Route::get('/show/record/{id}', [RecordController::class, 'record']);
Route::delete('/index/record/{id}', [RecordController::class, 'deleteRecord']);
Route::put('/update/record/{id}', [RecordController::class, 'updateRecord']);
