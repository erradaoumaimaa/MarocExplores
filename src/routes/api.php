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

Route:: post('/register', [AuthController::class, 'register']);
Route:: post('/login', [AuthController::class, 'login']);

// Authenticated only API

Route::middleware('auth:api')->group(function() {
    Route::get('/me', [UserController::class, 'me']);
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::controller(ItineraryController::class)->group(function () {
    Route::middleware('auth:api')->group(function () {
        Route::post('/itinerary/add', 'store');
    });
});

Route::controller(VisitController::class)->group(function () {
    Route::middleware('auth:api')->group(function () {
        Route::post('/itinerary/favoris', 'addToVisitList');
    });
});

//Visualisation itineries :
Route::get('/itineraries', [ItineraryController::class, 'index']);

