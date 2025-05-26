<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\JsonResponse;



class AuthController extends Controller
{
    // ✅ Register
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'role' => 'in:user,admin'
        ]);

        $data['password'] = Hash::make($data['password']);
        $data['role'] ??= 'user';

        $user = User::create($data);

        return response()->json([
            'status' => true,
            'message' => 'User created successfully',
            'user' => $user,
        ], 201);
    }

   // ✅ 1. Login Method
public function login(Request $request): JsonResponse
{
    $data = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (!Auth::attempt($data)) {
        return response()->json([
            'status' => false,
            'message' => 'Invalid login credentials',
        ], 401);
    }

    $user = User::where('email', $request->email)->first();
    $token = $user->createToken('auth_token')->plainTextToken;

    return response()->json([
        'token' => $token,
        'user' => $user,
    ]);
}

// ✅ 2. Profile Method
public function profile(): JsonResponse
{
    $user = Auth::user();

    return response()->json([
        'status' => true,
        'message' => 'User profile',
        'user' => $user,
    ]);
} 

// ✅ 3. Logout Method
public function logout(Request $request): JsonResponse
{
    $request->user()->currentAccessToken()->delete();

    return response()->json([
        'status' => true,
        'message' => 'User logged out successfully',
    ]);
} 

} 