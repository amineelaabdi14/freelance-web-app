<?php

namespace App\Http\Controllers;
use App\Models\Gig;
use App\Models\User;
use Illuminate\Http\Request;

class GigController extends Controller
{
    //
    public function create(Request $req){
        $user = auth()->user();
        $req['isActive'] = 1;
        $gig=$user->gigs()->create($req->all());
        $gig->save();
        return response()->json($gig);
    }
}
