<?php


use App\Http\Controllers\CityController;
use App\Http\Controllers\GymController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrainingPackageController;

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

Route::GET('/', function () {
    return view('welcome');
});

Route::GET('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

//coaches
Route::GET('/coaches', [CoacheController::class, 'index'])->name('coaches.index');

//gyms
Route::GET('/gyms', [GymController::class, 'index'])->name('gyms.index');
Route::GET('/gyms/create', [GymController::class, 'create'])->name('gyms.create');
Route::POST('/gyms', [GymController::class, 'store'])->name('gyms.store');
Route::GET('/gyms/{id}', [GymController::class, 'show'])->name('gyms.show');
Route::GET('/gyms/{id}/edit', [GymController::class, 'edit'])->name('gyms.edit');
Route::PUT('/gyms/{id}', [GymController::class, 'update'])->name('gyms.update');
Route::DELETE('/gyms/{id}', [GymController::class, 'destroy'])->name('gyms.destroy');
// Route::get('/gyms/create',[GymController::class ,'create'])->name('gym.create');

//sessions
Route::GET('/sessions', [SessionController::class, 'index'])->name('sessions.index');
Route::GET('/sessions/create', [SessionController::class, 'create'])->name('sessions.create');
Route::post('/sessions', [SessionController::class, 'store'])->name('sessions.store');

//cities
Route::GET('/cities', [CityController::class, 'index'])->name('cities.index');
Route::GET('/cities/{city}/edit', [CityController::class, 'edit'])->name('cities.edit');
Route::DELETE('/cities/{city}', [CityController::class, 'destroy'])->name('cities.destroy');


//users
Route::GET('/users', [UserController::class, 'index'])->name('users.index');

//training package
Route::GET('/training-package', [TrainingPackageController::class, 'index'])->name('training-package.index');
