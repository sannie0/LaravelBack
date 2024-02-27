<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryProductController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return view('hello', ['title' => 'Hello world!']);
});
Route::get('/category', [CategoryProductController::class, 'index']);

Route::get('/category/{id}', [CategoryProductController::class, 'show']);

Route::get('/item', [\App\Http\Controllers\ItemController::class, 'index']);

Route::get('/order/{id}', [\App\Http\Controllers\OrderController::class, 'show']);

Route::get('/item/create', [\App\Http\Controllers\ItemController::class, 'create']);

Route::post('/item', [\App\Http\Controllers\ItemController::class, 'store']);

Route::get('/item/edit/{id}', [\App\Http\Controllers\ItemController::class, 'edit']);

Route::post('/item/update/{id}', [\App\Http\Controllers\ItemController::class, 'update']);
