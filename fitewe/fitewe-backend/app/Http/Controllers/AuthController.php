<?php

namespace App\Http\Controllers;

use App\Models\User; 
use Validator;
use Lcobucci\JWT\Parser;
use DB;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller{

    // Login function
    public function login(Request $request){ 
        $credentials = [
            'username' => $request->username, 
            'password' => $request->password
        ];
    
        if( auth()->attempt($credentials) ){ 
            $user = Auth::user(); 
            $success['token'] =  $user->createToken('Pokedex')->accessToken; 
            return response()->json(['success' => $success], 200);
        } else { 
            return response()->json(['error'=>'Unauthorised'], 401);
        } 
    }

    // Logout function
    public function logout(Request $request) {
        $accessToken = Auth::user()->token();

        DB::table('oauth_refresh_tokens')
            ->where('access_token_id', $accessToken->id)
            ->update([
                'revoked' => true
            ]);

        $accessToken->revoke();
        return response()->json(null, 204); 
    }
    
}
