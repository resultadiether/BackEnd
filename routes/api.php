<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BookController;

// ✅ Public test route to confirm the backend is running
Route::get('/ping', function () {
    return response()->json([
        'message' => 'Backend is working!',
        'status' => 'success'
    ]);
});

Route::get('/books', [BookController::class, 'index']);
Route::post('/books/{id}/borrow', [BookController::class, 'borrow']);
Route::post('/books/{id}/return', [BookController::class, 'return']);

Route::middleware(['auth:sanctum', 'admin'])->prefix('admin')->group(function () {
    Route::get('/books', [BookController::class, 'index']);       
    Route::get('/books/{id}', [BookController::class, 'show']); 
    Route::post('/books', [BookController::class, 'store']);     
    Route::put('/books/{id}', [BookController::class, 'update']);
    Route::delete('/books/{id}', [BookController::class, 'destroy']);
});

Route::middleware(['auth:sanctum', 'admin'])->group(function () {
    Route::get('/admin/users', [UserController::class, 'index']);
});

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::group([
    'middleware' => ['auth:sanctum'],
], function () {
    Route::get('profile', [AuthController::class, 'profile']);
    Route::get('logout', [AuthController::class, 'logout']);
    
    // ✅ Route to return authenticated user
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

});
