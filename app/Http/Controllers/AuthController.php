<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {   
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('profile');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    
    }
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:35',
            'email' => 'required|string|email|max:35|unique:users',
            'password' => 'required|string|min:6',
        ], [
            'name.required' => 'Please provide a name.',
            'name.string' => 'Name must be a string.',
            'name.max' => 'Name should not exceed 35 characters.',
            'email.required' => 'Please provide an email address.',
            'email.string' => 'Email must be a string.',
            'email.email' => 'Please provide a valid email address.',
            'email.max' => 'Email should not exceed 35 characters.',
            'email.unique' => 'This email address is already taken.',
            'password.required' => 'Please provide a password.',
            'password.string' => 'Password must be a string.',
            'password.min' => 'Password must be at least 6 characters long.',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $validatedData = $validator->validated();
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'balance'=>0    
        ]);

        Auth::login($user);

        return response()->json(['message' => 'Registered and authenticated']);
    }
    public function logout(Request $request)
    {
        Auth::logout();

        return response()->json(['message' => 'Logged out']);
    }
}

