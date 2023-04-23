<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\User;
class ReportController extends Controller
{
    //
    
    public function report(Request $req,$id){
        // Report::create(['user_id'=>auth()->user()->id,'service_id'=>$id,'message'=>$req->reportMessage]);
        $report=auth()->user()->report()->create(['service_id'=>$id,'message'=>$req->reportMessage]);
        return redirect('service/'.$id);
    }
}
