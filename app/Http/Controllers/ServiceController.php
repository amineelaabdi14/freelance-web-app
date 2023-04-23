<?php

namespace App\Http\Controllers;
use App\Models\Service;
use App\Models\Category;
use App\Models\User;
use App\Models\Report;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    //
    public function create(Request $request){
        $service = auth()->user()->service()->make($request->all());
        $validator = Validator::make($request->all(), [
            'photo' => 'image|mimes:jpeg,png,jpg',
        ], [
            'photo.required' => 'Please select an image to upload.',
            'photo.image' => 'The selected file must be an image.',
            'photo.mimes' => 'The selected image must be a JPEG or PNG file.',
        ]);
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator->errors());
        }
        $path = $request->file('photo')->store('public/servicesImages/');
        $service->image=$path;
        $service->save();
        return redirect('/my-services');
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
        $service->load('comment');
        $comments = $service->comment()->orderBy('created_at', 'desc')->paginate(5);
        return view('service',['service'=>$service,"comments"=>$comments]);
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
