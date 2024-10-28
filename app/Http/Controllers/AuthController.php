<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;

class AuthController extends Controller
{
    
    public function register(RegisterRequest $request)
    {
       
        $input = $request->all();
        
   
        $input['password'] = bcrypt($input['password']);
        
        
        $user = User::create($input);
        $success['token'] = $user->createToken('MyApp')->plainTextToken;
        $success['name'] = $user->name;
        
        return response()->json([
            'data' => $success,
            'message' => 'User registered successfully.'
        ], 201);
    }

    public function login(LoginRequest $request)
    {
        
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            
            $success['token'] = $user->createToken('MyApp')->plainTextToken;
            $success['name'] = $user->name;
            
            
            return response()->json([
                'data' => $success,
                'message' => 'Login successful.'
            ], 200);
        } else {
           
            return response()->json(['message' => 'Unauthorized.'], 401);
        }
    }

    
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        
        return response()->json(['message' => 'Logged out successfully.'], 200);
    }
}