<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\GymController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/coaches', function () {
    return view('coaches.index');
});

Route::get('/gyms', [GymController::class, 'index'])->name('gym.index');
Route::get('/gyms/create', [GymController::class, 'create'])->name('gym.create');
// Route::get('/gyms/create',[GymController::class ,'create'])->name('gym.create');

Route::get('/sessions', [SessionController::class, 'index'])->name('sessions.index');
Route::get('/sessions/create', [SessionController::class, 'create'])->name('sessions.create');


//city
Route::get('/cities', [CityController::class, 'index'])->name('cities.index');


//users
Route::get('/users', [UserController::class, 'index'])->name('users.index');
//city manager routes
Route::GET('/city-managers', [CityManagerController::class, 'index'])->name('city-managers.index');

