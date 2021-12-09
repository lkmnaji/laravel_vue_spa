<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        if($validate->fails()) {
            return response()->json(
                [
                    'status' => false,
                    'messages' => 'Register Failed',
                    'data' => $validate->errors()
                ]
            );
        }

        $users = new User();
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = Hash::make($request->password);
        $users->save();

        return response()->json(
            [
                'status' => 'success',
                'message' => 'Register Success',
                'data' => $users
            ]
        );
    }

    public function login(Request $request) 
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $users = Auth::user();
            $users['token'] = $users->createToken($request->email)->plainTextToken;
            return response()->json([
                "status" => true,
                "message" => $users
            ]);
        } else {
            return response()->json([
                "status" => false,
                "message" => "Login Failed"
            ]);
        }
    }

    public function logout(){
        $users = Auth::user();
        $users->tokens()->delete();
        return response()->json([
            "status" => true,
            "message" => "Logout successfully"
        ]);
    }


}
