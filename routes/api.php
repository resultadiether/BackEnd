<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BookController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\JsonResponse;

// ✅ Health check route
Route::get('/ping', function () {
    return response()->json([
        'message' => 'Backend is working!',
        'status' => 'success'
    ]);
});

// ✅ Auth routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// ✅ Public books listing
Route::get('/books', [BookController::class, 'index']);

// ✅ Protected user routes
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/profile', [AuthController::class, 'profile']);
    Route::get('/logout', [AuthController::class, 'logout']);

    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::post('/books/{id}/borrow', [BookController::class, 'borrow']);
    Route::post('/books/{id}/return', [BookController::class, 'return']);
});

// ✅ Admin-only routes
Route::middleware(['auth:sanctum', 'admin'])->prefix('admin')->group(function () {
    Route::get('/books', [BookController::class, 'index']);
    Route::get('/books/{id}', [BookController::class, 'show']);
    Route::post('/books', [BookController::class, 'store']);
    Route::put('/books/{id}', [BookController::class, 'update']);
    Route::delete('/books/{id}', [BookController::class, 'destroy']);

    Route::get('/users', [UserController::class, 'index']);
});
