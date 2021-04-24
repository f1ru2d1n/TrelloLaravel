<?php

use App\Http\Controllers\Api\DeskController;
use App\Http\Controllers\Api\DeskListController;
use App\Http\Controllers\Api\PassportController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\TagController;
use App\Http\Controllers\Api\TaskController;
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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/


Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [RegisterController::class, 'login']);
//Route::get('login', [RegisterController::class, 'login'])->name('login');

Route::middleware('auth:api')->group(function() {
    Route::apiResource('desks', DeskController::class);
    Route::apiResource('lists', DeskListController::class);
    Route::apiResource('tasks', TaskController::class);
    Route::apiResource('tags', TagController::class);
});

