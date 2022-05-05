<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RemainingTrainingSessionsController;

use App\Http\Controllers\Api\UserController;


use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Api\SessionsController;
use App\Http\Controllers\Api\PackagesController;
use App\Http\Controllers\Api\AuthController;
use App\Models\User;
use App\Models\TrainingSession;
use App\Models\TrainingPackage;


use App\Http\Controllers\Api\EmailVerificationController;
use App\Http\Controllers\Auth\VerificationController;
use Illuminate\Support\Facades\Auth;


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

Route::controller(AuthController::class)->group(function () {
    Route::post('signin', 'signin');
    Route::post('signup', 'signup');
    Route::get('logout', 'logout')->middleware('auth:sanctum');

 
});
Route::post('/sanctum/token', function (Request $request){
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'device_name' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if (! $user || ! Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }

    return $user->createToken($request->device_name)->plainTextToken;
});