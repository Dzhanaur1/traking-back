<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TransportTypeController;
use App\Http\Middleware\AdminMiddleware;
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
Route::post('login', [AuthController::class, 'login']);
Route::post('registration', [AuthController::class, 'register']);
Route::get('logout', [AuthController::class, 'logout']);
Route::post('order/create', [OrderController::class, 'create']);
Route::get('/transport-types', [TransportTypeController::class, 'index']);

Route::middleware(AdminMiddleware::class)->group(function(){
    Route::get('admin', [OrderController::class, 'show']);
    Route::delete('order/delete/{id}', [OrderController::class, 'destroy']);
    Route::post('/order/update/{id}', [OrderController::class, 'updateStatus']);

});
