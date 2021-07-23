<?php

use App\Http\Controllers\SongController;
use App\Http\Controllers\AuthenticationController;
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

Route::post('/login', [AuthenticationController::class, 'login']);
Route::post('/register', [AuthenticationController::class, 'register']);

Route::group(['middleware'=>'auth:api'], function(){
    Route::get('/user', [AuthenticationController::class, 'me']);
    Route::post('/logout',[AuthenticationController::class, 'logout']);

    Route::post('/songs/search', [SongController::class, 'search']);
    Route::post('/songs', [SongController::class, 'store']);
    Route::get('/songs', [SongController::class, 'index']);
    Route::get('/songs/{song}', [SongController::class, 'show']);
    Route::put('/songs/{song}', [SongController::class, 'update']);
    Route::delete('/Songs/{song}', [SongController::class, 'destroy']);
});