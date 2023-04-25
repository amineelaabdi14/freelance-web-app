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
 
        return redirect()
                ->back()
                ->withErrors('Incorrect email or password');
    
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
            return redirect()
                ->back()
                ->withErrors($validator->errors());
        }
        $validatedData = $validator->validated();
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),  
            'updated_at' => null,
            'created_at' => date('now'),
            'image' => 'profilePictures/defaultAvatar.jpg',
            'job_title' => 'user',
        ]);
        $user->assignRole('visitor');
        Auth::login($user);

        return redirect()->intended('profile');
    }
    public function logout()
    {   
        Auth::logout();

        return redirect('authenticate');
    }
}

