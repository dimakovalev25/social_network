<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login()
    {

    }

    public function register(Request $request)
    {
        $validator  = Validator::make($request->all(), [
            'name' => 'required|string|max:25',
            'email' => 'required|string|email|max:25|unique:users',
            'password'=> 'required|confirmed'
        ]);

        if($validator->fails())
        {
            return response(['errors'=>$validator->errors()->all()], 422);
        }

        $user = User::create([
           'name' => $request->name,
           'email' => $request->email,
           'password' =>Hash::make($request->password) ,
        ]);

        if (!$user){
            return response()->json(['success'=>false, 'message'=>'error'], 500);
        }
        return response()->json(['success'=>true, 'message'=>'ok!']);
    }
}
