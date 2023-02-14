<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TimerController;

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

//customer api routes
Route::get('customers', [CustomerController::class, 'index']);
Route::get('customers/{id}', [CustomerController::class, 'show']);

//project api routes
Route::get('projects', [ProjectController::class, 'index']);
Route::get('projects/{id}', [ProjectController::class, 'show']);
Route::post('projects', [ProjectController::class, 'store']);

//timer api routes
Route::get('timers', [TimerController::class, 'index']);
Route::get('timers/{id}', [TimerController::class, 'show']);
Route::post('timers', [TimerController::class, 'store']);
Route::patch('timers/{id}', [TimerController::class, 'update']);