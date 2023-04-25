<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Report;
use App\Models\Service;
use Illuminate\Http\Request;
use illuminate\Database\Eloquent\SoftDeletes;

class UserController extends Controller
{
    public function manageUser(User $user){
        $services=Service::where('user_id','=',$user->id)->withTrashed()->get();
        return view ('manageuser',['user'=>$user,'services'=>$services,'allUserServices'=>Service::where('user_id','=',$user->id)->withTrashed()->get()]);
    }
    public function restricUser(User $user){
        $user->delete();
        foreach($user->service as $service){
            $service->delete();
        }
        return redirect()->back();
    }
}
