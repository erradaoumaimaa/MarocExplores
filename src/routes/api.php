<?php
use App\Http\Controllers\ItineraryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VisitController;

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

// Public accessible API
Route::controller(AuthController::class)->group(function () {
    Route:: post('/register',  'register');
    Route:: post('/login', 'login');

});


// Logout
Route::controller(AuthController::class)->group(function () {
    Route::middleware('auth:api')->group(function () {
        Route::post('/logout','logout');

    });
});

Route::controller(UserController::class)->group(function () {
    Route::middleware('auth:api')->group(function () {
        Route::get('/me', [UserController::class, 'me']);

    });
});

Route::controller(ItineraryController::class)->group(function () {
    Route::middleware('auth:api')->group(function () {
        Route::post('/itinerary/add', 'store');
        Route::put('/itinerary/{itinerary}/update', 'update');
        Route::delete('/itinerary/{itinerary}/destroy', 'destroy');
    });
});

Route::controller(VisitController::class)->group(function () {
    Route::middleware('auth:api')->group(function () {
        Route::post('/itineraries/{id}/visit',  'addToVisitList');
    });
});

//visualiser les différents itinéraires :
Route::get('/itineraries', [ItineraryController::class, 'index']);

