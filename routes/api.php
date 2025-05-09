<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\SaleController;

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

// Public routes
Route::post('/register', [AuthenticationController::class, 'register']);
Route::post('/login', [AuthenticationController::class, 'login']);

// Authenticated routes
Route::middleware('auth:sanctum')->group(function(){
    // User routes
    Route::get('/get-users', [UserController::class, 'getUsers']);
    Route::post('/add-user', [UserController::class, 'addUser']);
    Route::put('/edit-user/{id}', [UserController::class, 'editUser']);
    Route::delete('/delete-user/{id}', [UserController::class, 'deleteUser']);

    // Item routes
    Route::get('/get-items', [ItemController::class, 'getItems']);
    Route::post('/add-item', [ItemController::class, 'addItem']);
    Route::put('/edit-item/{id}', [ItemController::class, 'editItem']);
    Route::delete('/delete-item/{id}', [ItemController::class, 'deleteItem']);

    // Sales routes
    Route::get('/get-sales', [SaleController::class, 'getSales']);
    Route::post('/add-sale', [SaleController::class, 'addSale']);
    Route::put('/edit-sale/{id}', [SaleController::class, 'editSale']);
    Route::delete('/delete-sale/{id}', [SaleController::class, 'deleteSale']);
    
    // Additional sales endpoints
    Route::get('/get-sales-by-user/{user_id}', [SaleController::class, 'getSalesByUser']);
    Route::get('/get-sales-by-item/{item_id}', [SaleController::class, 'getSalesByItem']);

    // Authentication
    Route::post('/logout', [AuthenticationController::class, 'logout']);
});
