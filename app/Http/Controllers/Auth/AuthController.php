<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $this->validateRegister($request);
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=> bcrypt($request->password),
            'username'=>$request->username,
        ]);

        return response()->json([
            'code'=>200,
            'message'=>'Register success'
        ]);
    }

    private function validateRegister(Request $request){
        $validated = $request->validate([
            'email'=>'required|unique:users,email',
            'username'=>'required|unique:users,username',
        ]);

        return $validated;
    }

    public function login(Request $request){
        
        $this->validateLogin($request);
        try {
            $user = User::where('email', $request->username)
                        ->orWhere('username',$request->username)
                        ->firstOrFail();
    
            if (! $user || ! Hash::check($request->password, $user->password)) {
                return response()->json([
                    'error' => 'The provided credentials are incorrect.',
                ]);
            }
    
            $token = $user->createToken('auth_token')->plainTextToken;
    
            return response()->json([
                    'user'=>$user,
                    'access_token' => $token,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => 'The provided credentials are incorrect.',
            ]);
        }
    }

    private function validateLogin(Request $request){
        $validated = $request->validate([
            'username'=>'required',
            'password'=>'required'
        ]);
        return $validated;
    }

    public function logout(){
        Auth()->user()->tokens()->delete();
        return  response()->json([
            'message'=>'logout'
        ]);
    }
}
