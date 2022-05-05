<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RemainingTrainingSessionsController;

use App\Http\Controllers\Api\UserController;
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

Route::post('/login', [UserController::class, 'login']);

Route::post('/register', [UserController::class, 'register']);

Route::group(
    ['middleware' => 'auth:sanctum'],
    function () {

        Route::post('/update', [UserController::class, 'update']);

        Route::get('/attendance/history', [RemainingTrainingSessionsController::class, 'show']);
        Route::get('/session/remaining', [RemainingTrainingSessionsController::class, 'remainingSession']);

        Route::post('training-sessions/{id}/attend', [RemainingTrainingSessionsController::class, 'attendSession']);
    }
    
);
Auth::routes(['verify'=>true]);
Route::post('email/verification-notification', [EmailVerificationController::class, 'resend'])->middleware('auth:sanctum');
Route::get('email/verify/{id}', [EmailVerificationController::class, 'verify'])->name('verification.verify');
