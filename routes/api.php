<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::middleware('auth:sanctum')->get('/item', [\App\Http\Controllers\ItemControllerApi::class, 'index']);

Route::get('/category', [\App\Http\Controllers\CategoryControllerApi::class, 'index']);
Route::get('/category/{id}', [\App\Http\Controllers\CategoryControllerApi::class, 'show']);

Route::get('/item', [\App\Http\Controllers\ItemControllerApi::class, 'index']);
Route::get('/item/{id}', [\App\Http\Controllers\ItemControllerApi::class, 'show']);

Route::get('/order', [\App\Http\Controllers\OrderControllerApi::class, 'index']);
Route::get('/order/{id}', [\App\Http\Controllers\OrderControllerApi::class, 'show']);

Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);

Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout']);

/*Route::get('/user', function (Request $request){ return $request->user();});*/


/*Route::group(['middleware' => ['auth:sanctum']], function(){


});*/
