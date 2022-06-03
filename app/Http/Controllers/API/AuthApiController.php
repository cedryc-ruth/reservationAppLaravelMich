<?php

namespace App\Http\Controllers\API;

use App\Helpers\APIHelpers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AuthApiController extends Controller
{
    public function login(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);

        // Check email

        $user = User::where('email', $fields['email'])->first();


        // Check password

        if (!$user || !hash::check($fields['password'], $user->password)) {
            $response =  APIHelpers::createAPIResponce(false, 401, 'Bad credentials', null);
            return response()->json($response, 401);
        }

        // Create a token for Admin to make CUD

        if ($user->role_id == 1) {
            $token = $user->createToken('myapptoken')->plainTextToken;
            $response = [
                'user' => $user,
                'token' => $token
            ];
            return response()->json($response, 201);
        } else {
            $response = [
                'user' => $user,
            ];

            return response()->json($response, 201);
        }
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();

        $response =  [
            'message' => 'Logged out'
        ];

        return response()->json($response,200);
    }
}
