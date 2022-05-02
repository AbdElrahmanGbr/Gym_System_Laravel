<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\GymController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\gymManagerController;
use App\Http\Controllers\TrainingPackageController;
use App\Http\Controllers\CoachController;

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

//-------------------------- City Managers Routes --------------------------------
Route::get('city-managers/create', [CityManagerController::class, 'create'])->name('city-managers.create');

Route::post('destroy-city-manager', [cityManagerController::class, 'destroy'])->name('city-managers.destroy');

Route::GET('/city-managers', [CityManagerController::class, 'index'])->name('city-managers.index');

Route::GET('/city-managers/{id}/edit', [CityManagerController::class, 'edit'])->name('city-managers.edit');

Route::PUT('/city-managers/{id}', [CityManagerController::class, 'update'])->name('city-managers.update');

Route::POST('/city-managers', [CityManagerController::class, 'store'])->name('city-managers.store');


Route::get('gym-managers',[gymManagerController::class,'index'])->name('gym-managers.index');
Route::get('gym-managers/create', [gymManagerController::class, 'create'])->name('gym-managers.create');
Route::post('gym-managers',[gymManagerController::class, 'store'])->name('gym-managers.store');
Route::get('gym-managers/{gymManagerId}/edit',[gymManagerController::class, 'edit'])->name('gym-managers.edit');
Route::put('gym-managers/{gymManagerId}',[gymManagerController::class, 'update'])->name('gym-managers.update');
Route::post('destroy-gym-manager',[gymManagerController::class,'destroy'])->name('gym-managers.destroy');
// Route::get('getGym/{id}', function ($id) {
//     $gym = App\Models\Gym::where('city_id',$id)->get();
//     return response()->json($gym);
// });


