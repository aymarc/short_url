<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('api')->get('/', [DashboardController::class, 'getFullUrl']);

Route::group(['middleware'=>'api', 'prefix'=>'auth'], function($router){

    Route::post('/', [AuthController::class, 'register'] );
    Route::post('/login', [AuthController::class, 'login']);   
    Route::post('/logout', [AuthController::class, 'logout']);
    
});

Route::group(['middleware'=>'api', 'prefix'=>'url'], function($router){
    Route::post('/', [DashboardController::class, 'saveUrl']);
    Route::get('/', [DashboardController::class, 'getUrls']);
});
