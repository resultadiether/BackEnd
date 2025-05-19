<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // ✅ Register API
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'role' => 'in:user,admin', // Optional but safe validation
        ]);

        $data['password'] = Hash::make($data['password']);
        $data['role'] = 'user';  // or whatever default role you want


        $user = User::create($data);

        return response()->json([
            'status' => true,
            'message' => 'User created successfully',
            'user' => $user,
        ]);
    }

    // ✅ Login API
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid credentials'
            ]);
        }

        $user = Auth::user();
        $token = $user->createToken('api_token')->plainTextToken;

        return response()->json([
            'status' => true,
            'message' => 'Login successful',
            'token' => $token,
            'user' => $user,  
            'user' => auth()->user(), // This will return the authenticated user
        ]);
    }

    // ✅ Profile API
    public function profile()
    {
        $user = Auth::user();

        return response()->json([
            'status' => true,
            'message' => 'User profile',
            'user' => $user,
        ]);
    }

    // ✅ Logout API
    public function logout()
    {
        Auth::logout();

        return response()->json([
            'status' => true,
            'message' => 'User logged out successfully'
        ]);
    }
}
