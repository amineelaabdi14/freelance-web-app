<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EditProfileController extends Controller
{
    //
    public function editprofile(Request $req){
        $user=auth()->user();
        if(!Hash::check($req->password,$user->password)){
            return view('profile',['message'=>'Incorrect password','type'=>'danger']);
        }
        $user->name=$req->name;
        $user->email=$req->email;
        $user->birthday=$req->birthday;
        if($req->newPassword) $user->password = Hash::make($req->newPassword);
        $user->save();
        return view('profile')->with('message', 'Saved')->with('type', 'success');

    }
}
