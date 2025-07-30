<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $token = $request->user()->createToken('API Token')->plainTextToken;

            return response()->json([
                'token' => $token,
                'id_user' => $request->user()["id"],
                'name' => $request->user()["name"],
                'username' => $request->user()["username"],
                'email'=> $request->user()["email"]]);
        }

        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Successfully logged out']);
    }

    public function register(Request $request)
    {

        $request->validate([
            'name' => 'required|string',
            'username' => 'required|string',
            'email' => 'required|email',
            'country' => 'required|string',
            'state' => 'required|string',
            'city' => 'required|string',
            'password' => 'required',
        ]);

        try {

            $user = new User([
                'name' => $request->input('name'),
                'username' => $request->input('username'),
                'email' => $request->input('email'),
                'country' => $request->input('country'),
                'state' => $request->input('state'),
                'city' => $request->input('city'),
                'password' => bcrypt($request->input('password')),
            ]);
    
            $user->save();
            
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }


        return response()->json(['message' => 'Registro criado com sucesso'], 201);
    }

}
