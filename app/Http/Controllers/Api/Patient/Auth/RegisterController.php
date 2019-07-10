<?php

namespace App\Http\Controllers\Api\Patient\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Doctor;
use Illuminate\Support\Facades\Auth;
use App\Patient;
use Validator;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstname' => 'required',
            'lastname' => 'required',
            'department_id' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
            'phonenumber' => 'required',
            'DOB' => 'required',
            'gender' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = Patient::create($input);
        return response()->json(['Success'=>'True','Patient'=>$user]);
    }
}
