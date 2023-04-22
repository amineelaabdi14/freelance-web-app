<?php

namespace App\Http\Controllers;
use App\Models\Service;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    //
    public function create(Request $req){
        $user = auth()->user();
        $req['isActive'] = 1;
        $gig=$user->gigs()->create($req->all());
        $gig->save();
        return response()->json($gig);
    }

    public function edit(Service $service){
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

    public function delete(Service $service){
        $service->delete(); 
        return redirect('/my-services');
    }

    public function showService(Service $service){
        return view('service',['service'=>$service]);
    }
    public function getEditService(Service $service){
        return view('editservice',['categories'=>Category::all(),'service'=>$service]);
    }
    public function search(Request $request) {
        $searchKeyword=$request->search;
        $services = Service::whereHas('user', function($query) use ($searchKeyword) {
            $query->where('job_title', 'like', "%$searchKeyword%");
        })
        ->orwhere('title', 'like', "%$searchKeyword%")
        ->paginate(20);
        return view('services', compact('services'));
    }
}
