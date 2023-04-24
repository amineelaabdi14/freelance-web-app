<?php

namespace App\Http\Controllers;
use App\Models\Service;
use App\Models\Category;
use App\Models\User;
use App\Models\City;
use App\Models\Report;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    //
    public function create(Request $request){
        $validator = Validator::make($request->all(), [
            'photo' => 'mimes:jpeg,png,jpg|max:5048',
            'title' => 'required',
            'price' => 'required',
            'work_time' => 'required',
            'description' => 'required|min:260',
        ], [
            'photo.image' => 'The selected file must be an image.',
            'photo.mimes' => 'The selected image must be a JPEG or PNG file.',
            'photo.max' => 'The selected image is too large.',
            'title.required' => 'Please enter the title',
            'price.required' => 'Please enter the price',
            'work_time.required' => 'Please enter the work time',
            'description.required' => 'Please enter the description',
            'description.min' => 'Description must be at least 260 caracters',
        ]);
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator->errors());
        }
        if ($request->hasFile('photo')) {
            $path = substr($request->file('photo')->store('public/servicesImages'),7);
        }
        else{
            $path ='servicesImages/upload-service-image.png';
        }
        $service = auth()->user()->service()->make($request->all());
        $service->image=$path;
        $service->save();
        return redirect('/my-services');
    }

    public function edit(Service $service,Request $request){
        $validator = Validator::make($request->all(), [
            'photo' => 'mimes:jpeg,png,jpg|max:5048',
            'title' => 'required',
            'price' => 'required',
            'work_time' => 'required',
            'description' => 'required|min:260',
        ], [
            'photo.image' => 'The selected file must be an image.',
            'photo.mimes' => 'The selected image must be a JPEG or PNG file.',
            'photo.max' => 'The selected image is too large.',
            'title.required' => 'Please enter the title',
            'price.required' => 'Please enter the price',
            'work_time.required' => 'Please enter the work time',
            'description.required' => 'Please enter the description',
            'description.min' => 'Description must be at least 260 caracters',
        ]);
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator->errors());
        }
        if ($request->hasFile('photo')) {
            $path = substr($request->file('photo')->store('public/servicesImages'),7);
            $service->update($request->all());
            $service->image=$path;
            $service->save();
        }
        else{
            $service->update($request->all());
        }
        return redirect('/my-services');
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
        return view('editservice',['categories'=>Category::all(),'service'=>$service,'cities'=>City::all()]);
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
