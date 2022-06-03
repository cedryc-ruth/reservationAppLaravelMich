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
        $fields = $request->validate([  // On contrôle les données saisies à travers la request
            'email' => 'required|string|email',  
            'password' => 'required|string'
        ]);

        // Check email

        $user = User::where('email', $fields['email'])->first();


        // Check password

        if (!$user || !hash::check($fields['password'], $user->password)) {  // Si l'email n'est pas vérifié ou le password
            $response =  APIHelpers::createAPIResponce(false, 401, 'Bad credentials', null);
            return response()->json($response, 401);  // On renvoit La réponse 401 Unauthorized avec le message 'Bad credentials'
        }

        // Create a token for Admin to make CUD

        if ($user->role_id == 1) {  // Seul un user ayant le rôle admin (id=1) a droit de réaliser le update, le create et le delete
        
            $token = $user->createToken('myapptoken')->plainTextToken;  // Pour pouvoir réaliser le CUD, il faut générer un token pour l'admin authentifié
            
            $data = [
                'user' => $user,
                'token' => $token
            ];
            $response =  APIHelpers::createAPIResponce(false, 200, 'Authentified as Admin', $data);
            return response()->json($response, 200); // On retourne une réponse json contenant le données du $user et le token
        } 
        else 
        {
            $data = [
                'user' => $user,
            ];

            $response =  APIHelpers::createAPIResponce(false, 200, 'Authentified as simple User', $data);
            return response()->json($response, 200);  // Si le $user authentifié n'est pas admin, on lui retourne seulement ses données. 
        }
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();  // À la deconnexion, on détruit les tokens si elles existent

        $response =  [
            'message' => 'Logged out'  
        ];

        return response()->json($response,200);  // On renvoit un message 'logged out' avec le code 200 ok
    }
}
