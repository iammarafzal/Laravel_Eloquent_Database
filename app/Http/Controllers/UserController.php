<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    // Create a new User with Profile and Posts
    public function store(Request $request){
        // 1. Basic Validation
        $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'profile.phone' => 'required',
            'posts' => 'array'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if ($request->has('profile')) {
            $user->profile()->create($request->profile);
        }

        if ($request->has('posts')) {
            $user->posts()->createMany($request->posts);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'User created successfully with posts',
            'user' => $user->load('profile', 'posts')
        ], 201);
    }

    public function show($id){
        $user = User::with(['profile', 'posts'])->find($id);

        if (!$user){
            return response()->json([
                'status' => 'error',
                'message' => 'User not found',
            ], 404);
        }
        return response()->json($user);
    }

}
