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
            return response()->json(['message' => 'incorrect password'], 404);
        }
        $user->name=$req->newName;
        $user->email=$req->newEmail;
        $user->password= Hash::make($req->newPassword);
        $user->save();
        return response()->json($user);
    }
}
