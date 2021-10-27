<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required'
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();

        // create toke
        $token = $user->createToken('myAccount')->plainTextToken;
        return response()->json([
            'message'=>'User created',
            'user'=>$user,
            'token'=>$token
        
        ]);
    }

    public function login(){

    }


    public function logout(){

    }
}
