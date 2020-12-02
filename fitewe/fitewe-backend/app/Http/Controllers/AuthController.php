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

    // Registering function
    public function register(Request $request) { 
        $validator = Validator::make($request->all(), [ 
            'username' => 'required', 
            'password' => 'required', 
            'password_confirmation' => 'required|same:password', 
        ]);

        if ($validator->fails()) { 
            return response()->json([ 'error'=> $validator->errors() ]);
        }

        $data = $request->all(); 
        $data['password'] = Hash::make($data['password']);
        $date['admin'] = 0;

        $user = User::create($data); 
        $success['token'] =  $user->createToken('Fitewe')->accessToken;

        return response()->json(['success'=>$success], 200);
    }

    // User details function
    public function userInfo(Request $request) { 
        $user = Auth::user();

        if($user){
            $user->makeHidden(['id', 'profile_icon_id','email_verified_at', 'admin', 'created_at', 'updated_at']);
            return response()->json(['success' => $user], 200);
        }else{
            return response()->json(['error' => 'Unauthorised. You must be authentified'], 401);
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

    // Get user by id function
    public function getUserById($id){
        $user = User::find($id);

        if($user){
            $user->makeHidden(['email_verified_at', 'admin', 'created_at', 'updated_at']);
            return response()->json(['success' => $user], 200);
        }else{
            return response()->json(['error' => 'User not found.'], 404);
        }
    }

    // Get all users
    public function getUsers(){
        $users = User::orderBy('username')->get();
        $users->makeHidden(['email_verified_at', 'admin', 'created_at', 'updated_at']);

        return response()->json(['success' => $users], 200);
    }

    // Edit username of the current user
    public function editUsername(Request $request){
        $user = Auth::user();

        if($user){
            $user->update($request->all());
            return response()->json(['success' => 
                $user->makeHidden(['email_verified_at', 'admin', 'created_at', 'updated_at'])], 200);
        }else{
            return response()->json(['error' => 'Unauthorised. You must be authentified'], 404);
        }
    }
    
}
