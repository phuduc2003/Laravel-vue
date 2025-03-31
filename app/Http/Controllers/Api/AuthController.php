<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
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
        // $token = $user->createToken('main')->plainTextToken;
        try {
            $token = $user->createToken('main')->plainTextToken;
        } catch (\Exception $e) {
            return response(['error' => $e->getMessage()], 500);
        }
    return response([
       'user' =>new UserResource($user) ,
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
    public function getUser(Request $request)
    {
       return new UserResource($request->user());
    }


}
