<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\AuthResoruce;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException as ValidationValidationException;

class AuthController extends Controller
{
    function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        return $this->makeToken($user);

    }

    function register(Request $request)
    {

        $request->validate([
            'name' => 'required|min:4',
            'email' => 'required|unique:users',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6'
        ]);

        $user=User::create([
            'name' =>$request->name,
            'email' =>$request->email,
            'password' =>Hash::make($request->name),
        ]);

        return $this->makeToken($user);

    }

    function makeToken($user){
        $token = $user->createToken('user-token')->plainTextToken;
        return (new AuthResoruce($user))
            ->additional(['meta' => [
                'token' => $token,
                'token_type' => 'Bearer',
            ]]);

    }

    function logout(Request $request){
     $request->user()->tokens()->delete();
     return send_msg('User Logout',true,200);
    }
    function user(Request $request){
      return AuthResoruce::make($request->user());
    }
}
