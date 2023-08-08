<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class apiauthcontroller extends Controller
{
    function signup(Request $req){
        //validate
        $validator = Validator::make($req->all(),[
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required'
                ]);
                if($validator->fails()){
                    return response()->json(["message"=>"Fill correct format"]);
                }


        $user = new User;
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $result=$user->save();
        if($result){
            return["status"=>"Successfully Inserted into a database"];
        }else{
            return["status"=>"Something Wrong"];
        }
}



function login(Request $request){
    //validate
    $validator = Validator::make($request->all(),[
'email'=>'required|email',
'password'=>'required'
    ]);
    if($validator->fails()){
        return response()->json(["message"=>"Fill correct format"]);
    }


    $credentials = $request->only('email', 'password');
    if (Auth::attempt($credentials)) {
        $user = Auth::User();
        $token = $user->createToken('authToken')->plainTextToken;
        return response()->json(['token' => $token]);
    }
    return response()->json(['message' => 'Error Login']);

    }



    function logout(Request $request){
        $request->user()->currentAccessToken()->delete();
        return response()->json(["ststus"=>"successfully Logout"]);

    }
}
