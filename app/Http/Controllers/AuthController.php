<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    public function login(Request $request){
        $scredentials=$request->validate(
            [
                'email' => ['required','email'],
                'password' => 'required',
                'remember'=>'boolean'
            ]
            );

        $remember = $scredentials['remember'] ?? false;
        unset($scredentials['remember']);
        if(!Auth::attempt($scredentials,$remember)){
            return response(
                [
                    'message' => 'Email or password is incorrect'
                ],422
            );
        }

        $user = Auth::user();
        if(!$user->is_admin){
            Auth::logout();
            return response(
                [
                    'message' => 'You dont have permission to authenticate as admin'
                ],403
            );
        }
        $token = $user->createToken('main')->plainTextToken;
    return response([
       'user' =>$user,
       'token' => $token
    ]);

    }
/** @var \App\Models\User $user */
    public function logout()
    {
        $user = Auth::user();
        $user->currentAccessToken()->delete();
        return response('',204);
    }


}
