<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SessionController;

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

 Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/coaches', function () {
    return view('coaches.index');
});

Route::get('/gyms',[GymController::class ,'index'])->name('gym.index');
Route::get('/gyms/create',[GymController::class ,'create'])->name('gym.create');

Route::get('/sessions',[SessionController::class, 'index'])->name('sessions.index');
Route::get('/sessions/create',[SessionController::class, 'create'])->name('sessions.create');


