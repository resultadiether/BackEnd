<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return response()->json([
            'status' => true,
            'users' => User::select('id', 'name', 'email', 'role')->get()
        ]);
    }
}

