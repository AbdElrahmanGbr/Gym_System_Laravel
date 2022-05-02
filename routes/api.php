<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RemainingTrainingSessionsController;

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

Route::get('/attendance/history',[RemainingTrainingSessionsController::class, 'show']);

Route::get('/session/remaining', [RemainingTrainingSessionsController::class, 'remainingSession']);

Route::post('training-sessions/{id}/attend', [RemainingTrainingSessionsController::class, 'attendSession']);
