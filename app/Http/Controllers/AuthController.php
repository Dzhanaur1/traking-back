<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $req){
        $credentails = $req->all();

        $token = Auth::attempt($credentails);
        $user = Auth::user();

        if(!$token){
            return response()->json([
                'ststus'=>'error',
                'message'=>'Unauthorized'
            ],401);
        }
        return response()->json([

                'token' => $token,
                'role'=>$user->role


        ],200);

    }
    public function logout()
    {
        Auth::logout();

        // $request->session()->invalidate();
        // $request->session()->regenerateToken();

        return redirect('/');
        return response()->json([
            'data' => [
                'message' => 'Logout successful',
            ]
        ], 200);
    }
    public function register(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'login' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:6',


        ]);

        if($validator->fails()){
            $errors = $validator->errors();
            $message = 'Некорректные данные';
        if ($errors->has('login')) {
            $message = 'Пользователь с таким логином уже существует';
        }
        return response()->json([
            'message'=>$message,
            'error'=>$validator->errors()
        ],422);
        }

        $user = User::create([
            'name' => $request->name,
            'login' => $request->login,
            'password' => Hash::make($request->password),
            'role'=>"user",]);

            Auth::login($user);

            // Создание токена
            $token = $user->createToken('auth_token')->plainTextToken;

                return response()->json([

                        'user_role'=> $user->role,
                        'token'=>$token,
                        'status'=> 'created',

                    ],201);
    }
}
