<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (!Auth::attempt($credentials)) {
            return response()->json(['message' => 'Login gagal'], 401);
        }

        $user = $request->user();
        $token = $user->createToken('api-token')->plainTextToken;

        return response()->json([
            'token' => $token,
            'user' => $user
        ]);
    }
    public function register(RegisterRequest $request)
    {
		    // Membuat record User baru dan menyimpan di database
        $newUser = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'email_verified_at' => Carbon::now(),
        ]);
        
				// Sekalian langsung login
        Auth::login($newUser);
        
        $token = $newUser->createToken('lulus-semua')->plainTextToken;
        return response()->json([
            'user' => $newUser,
            'token' => $token,
            'message' => 'Register Berhasil'
        ]);
    }
    public function logout(Request $request)
    {
        if($request->user()){
            $request->user()->currentAccessToken()->delete();
        }

        return response()->json([
            'message' => 'Logout Berhasil'
        ], 204);
    }

    public function all_users()
    {
        return response()->json(User::all());
    }
}