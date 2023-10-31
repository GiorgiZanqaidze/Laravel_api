<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function register(Request $request, User $user): void
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

    }
    public function login(Request $request): JsonResponse|string
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);




        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return response()->json(['user'=> Auth::user()->only(['email', 'name', "id"])], 201);
        }
        return response()->json(['message'=> 'Unauthorized user', 'ERROR' => "Email or password is invalid"], 401);
    }


    public function logout(Request $request): JsonResponse
    {
        $request->session()->invalidate();

        return response()->json(['message' => 'Log out'], 200);
    }

    public function getUser(Request $request) {
        return $request->user();
    }
}
