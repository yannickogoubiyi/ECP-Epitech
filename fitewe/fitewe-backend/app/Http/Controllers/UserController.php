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

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ]);

        if($validator->fails()){
            return response()->json([ 'error'=> $validator->errors() , 404]);     
        }

        $user = User::find($id);
        
        if($user){
            $user->username = $request->input('username');
            $user->firstname = $request->input('firstname');
            $user->lastname = $request->input('lastname');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));
            $user->save();

            return response()->json([
                "success" => true,
                "message" => "User updated successfully.",
                "data" => $user
                ]);
        }else{
            return response()->json(['error' => 'User not found.'], 404);
        }
        
    }

    public function destroy($id)
    {
        $user = User::find($id);

        if($user){
            $user->delete();
            return response()->json([
                "success" => true,
                "message" => "User deleted successfully.",
                "data" => $user
                ]);
        }else{
            return response()->json(['error' => 'User not found.'], 404);
        }
        
    }
}
