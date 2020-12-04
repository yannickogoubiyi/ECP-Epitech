<?php

namespace App\Http\Controllers;

use App\Models\User; 
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller{

    public function index()
    {
        return User::orderBy('username')->get();
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [ 
            'username' => 'required', 
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password', 
        ]);

        if ($validator->fails()) { 
            return response()->json([ 'error'=> $validator->errors() ]);
        }

        $data = $request->all(); 
        $data['password'] = Hash::make($data['password']);
        $data['admin'] = 0;

        $user = User::create($data); 
        $success['token'] =  $user->createToken('Fitewe')->accessToken;

        return response()->json(['success' => $success], 200);
    }

    public function show($id)
    {
        $user = User::find($id);

        if($user){
            $user->makeHidden(['email_verified_at', 'created_at', 'updated_at']);
            return response()->json(['user' => $user], 200);
        }else{
            return response()->json(['error' => 'User not found.'], 404);
        }
    }

    public function update(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password',
        ]);

        if($validator->fails()){
            return response()->json([ 'error'=> $validator->errors() , 404]);     
        }

        $data = $request->all();
        $data['password'] = Hash::make($data['password']);

        $user = User::update($data);

        return response()->json([
            "success" => true,
            "message" => "User updated successfully.",
            "data" => $user
        ]);
    }

    public function destroy(User $user)
    {
        return response()->json([
            "success" => true,
            "message" => "User deleted successfully.",
            "data" => $user
            ]);
    }

    // User details function
    public function userDetails(Request $request) { 
        $user = Auth::user();

        if($user){
            $user->makeHidden(['id', 'avatar','email_verified_at', 'admin', 'created_at', 'updated_at']);
            return response()->json(['success' => $user], 200);
        }else{
            return response()->json(['error' => 'Unauthorised. You must be authentified'], 401);
        } 
    }
}
