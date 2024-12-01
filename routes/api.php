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

/*Route::middleware('auth:sanctum')->get('/item', [\App\Http\Controllers\ItemControllerApi::class, 'index']);

Route::middleware('auth:sanctum')->get('/user', function(Request $request){
    return $request->user();
});*/

Route::get('/category', [\App\Http\Controllers\CategoryControllerApi::class, 'index']);
Route::get('/category/{id}', [\App\Http\Controllers\CategoryControllerApi::class, 'show']);

//Route::get('/item', [\App\Http\Controllers\ItemControllerApi::class, 'index']);
Route::get('/item/{id}', [\App\Http\Controllers\ItemControllerApi::class, 'show']);

Route::get('/order', [\App\Http\Controllers\OrderControllerApi::class, 'index']);
Route::get('/order/{id}', [\App\Http\Controllers\OrderControllerApi::class, 'show']);

Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);
//Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout']);

//Route::middleware('auth:sanctum')->get('/logout', [\App\Http\Controllers\AuthController::class, 'logout']);

Route::middleware('auth:sanctum')->group(function () {//защищенные маршруты
    Route::get('/item', [\App\Http\Controllers\ItemControllerApi::class, 'index']);
    Route::get('/user', function(Request $request) {
        return $request->user();
    });

    Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout']);
});

Route::get('/categories_total', [\App\Http\Controllers\CategoryControllerApi::class, 'total']);
Route::get('/items_total', [\App\Http\Controllers\ItemControllerApi::class, 'items']);
