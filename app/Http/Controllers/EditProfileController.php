<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class EditProfileController extends Controller
{
    //
    public function editprofile(Request $request){
        $validator = Validator::make($request->all(), [
            'photo' => 'mimes:jpeg,png,jpg|max:5048',
        ], [
            'photo.image' => 'The selected file must be an image.',
            'photo.mimes' => 'The selected image must be a JPEG or PNG file.',
        ]);
        if ($validator->fails()) {
            return view('profile',['message'=>'The selected image must be a JPEG or PNG file ','type'=>'danger']);
        }
        $user=auth()->user();
        if(!Hash::check($request->myPassword,$user->password)){
            return view('profile',['message'=>'Incorrect password','type'=>'danger']);
        }
        if ($request->hasFile('photo')) {
            $path = substr($request->file('photo')->store('public/pofilePictures'),7);
            $user->update($request->all());
            $user->image=$path;
            if($request->newPassword) {
                $user->password = Hash::make($request->newPassword);
            }
            $user->save();
        }
        else{
            if($request->newPassword) $user->password = Hash::make($request->newPassword);
            $user->update($request->all());
        }
        return view('profile')->with('message', 'Saved')->with('type', 'success');
    }
}
