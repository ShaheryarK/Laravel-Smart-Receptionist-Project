<?php

namespace App\Http\Controllers\Api\Doctor\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use JWTFactory;
use JWTAuth;
use JWTAuthException;
use App\Doctor;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    public function __construct()
    {
        $this->doctor = new Doctor;
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password'=> 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        config()->set( 'auth.defaults.guard', 'doctor' );
        \Config::set('jwt.user', 'App\Doctor');
        \Config::set('auth.providers.users.model', \App\Doctor::class);
        $credentials = $request->only('email', 'password');
        $token = null;



        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        $doctor = Doctor::where('email', $request->email)->first();

        return response()->json(compact('doctor','token'));
    }
}