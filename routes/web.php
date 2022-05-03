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

//-------------------------- Sessions Routes --------------------------------
Route::GET('/sessions', [SessionController::class, 'index'])->name('sessions.index');
Route::GET('/sessions/create', [SessionController::class, 'create'])->name('sessions.create');
Route::post('/sessions', [SessionController::class, 'store'])->name('sessions.store');
Route::post('destroy', [SessionController::class, 'destroy'])->name('sessions.destroy');
Route::get('edit', [SessionController::class, 'edit'])->name('sessions.edit');

//-------------------------- Cities Routes --------------------------------
Route::get('cities', [CityController::class, 'index'])->name('cities.index');
Route::post('edit-city', [CityController::class, 'edit'])->name('cities.edit');
Route::post('destroy-city', [CityController::class, 'destroy'])->name('cities.destroy');
Route::post('store-city', [CityController::class, 'store'])->name('cities.store');



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

/* ======================= Coaches Routes ========================= */
Route::get('/coaches', [CoachController::class, 'index'])->name('coaches.index');

Route::get('/coaches/profile/show', [CoachController::class, 'profile'])->name('coaches.profile');

Route::get("/coaches/profile/edit", [CoachController::class, 'edit'])->name('coaches.edit');

Route::get('/coaches/sessions', [CoachController::class, 'sessions'])->name('coaches.sessions');

Route::get("/coaches/password", [CoachController::class, 'password'])->name('coaches.password');

/* ===============================  login and register  ====================================== */

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Route::post('/login',[UserController::class, 'login']);

// Route::post('/register', [UserController::class, 'register']);


Route::group(['middleware' => 'auth'], function () {

    Route::GET('/coaches', function () {
        return view('coaches.index');
    });
    Route::GET('/gyms', [GymController::class, 'index'])->name('gyms.index');
    Route::GET('/gyms/create', [GymController::class, 'create'])->name('gyms.create');
    Route::POST('/gyms', [GymController::class, 'store'])->name('gyms.store');
    Route::GET('/gyms/{id}', [GymController::class, 'show'])->name('gyms.show');
    Route::GET('/gyms/{id}/edit', [GymController::class, 'edit'])->name('gyms.edit');
    Route::PUT('/gyms/{id}', [GymController::class, 'update'])->name('gyms.update');
    Route::DELETE('/gyms/{id}', [GymController::class, 'destroy'])->name('gyms.destroy');



    Route::get('gym-managers', [gymManagerController::class, 'index'])->name('gym-managers.index');
    Route::get('gym-managers/create', [gymManagerController::class, 'create'])->name('gym-managers.create');
    Route::post('gym-managers', [gymManagerController::class, 'store'])->name('gym-managers.store');
    Route::get('gym-managers/{gymManagerId}/edit', [gymManagerController::class, 'edit'])->name('gym-managers.edit');
    Route::put('gym-managers/{gymManagerId}', [gymManagerController::class, 'update'])->name('gym-managers.update');
    Route::post('destroy-gym-manager', [gymManagerController::class, 'destroy'])->name('gym-managers.destroy');
    Route::get('getGym/{id}', function ($id) {
        $gym = App\Models\Gym::where('city_id', $id)->get();
        return response()->json($gym);
    });
});

//---------------------------- Training Packages Routes -----------------------------------------------
Route::get('training-packages', [TrainingPackageController::class, 'index'])->name('training-packages.index');
Route::get('training-packages/{training-package}/edit', [TrainingPackageController::class, 'edit'])->name('training-packages.edit');
Route::put('training-packages/{training-package}', [TrainingPackageController::class, 'update'])->name('training-packages.update');
Route::post('destroy-training-package', [TrainingPackageController::class, 'destroy'])->name('training-packages.destroy');
