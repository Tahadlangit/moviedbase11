<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
{

    $credentials = $request->only('email', 'password');
    if (Auth::attempt($credentials)) {

        $token = auth()->user()->createToken('my-token')->plainTextToken;
        return response()->json(['token' => $token]);
    } else {
        return response()->json(['message' => 'Invalid credentials'], 401);
    }
}

}
