<?php

use App\Http\Controllers\PlayersApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/players', [PlayersApiController::class, 'index']);
Route::get('/all_players', [PlayersApiController::class, 'allPlayers']);
Route::get('/all_players/{date}', [PlayersApiController::class, 'playersFromDate']);
Route::get('/statistics', [PlayersApiController::class, 'getStatistics']);
Route::post('/players', [PlayersApiController::class, 'store']);


