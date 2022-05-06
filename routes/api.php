<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RemainingTrainingSessionsController;
use App\Models\User;
use App\Notifications\UserNotification;
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
Route::get('/email/verify/{id}/{hash}', function ($id) {
    $user = User::find($id);
    $user->update([
        'email_verified_at' => now()->toDateTimeString()
    ]);

    $user->notify(new UserNotification(["message" => "Welcome to our app, Nice To Meet You"]));

    return response()->json(['message' => "Your account has been updated successfully😎"]);
})->name('verification.verify');


Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
