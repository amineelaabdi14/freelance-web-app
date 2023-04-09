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
    public function edit(Request $req){
        $gig=Gig::find($req->id);
        $gig->category_id=$req->category_id;
        $gig->title=$req->title;
        $gig->description=$req->description;
        $gig->price=$req->price;
        $gig->delivery_time=$req->delivery_time;
        $gig->delivery_time=$req->delivery_time;
        $gig->save();
        return response()->json($gig);
    }
    public function delete(Gig $gig){
        $gig->delete();
        return view('dashboard');
    }
    
}
