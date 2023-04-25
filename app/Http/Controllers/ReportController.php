<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\User;
class ReportController extends Controller
{
    //
    
    public function report(Request $req,$id){
        $user=auth()->user();
        if(count($user->report->Where('service_id','=',$id))==0){
            $report=$user->report()->create(['service_id'=>$id,'message'=>$req->reportMessage]);
        }
        return redirect('service/'.$id);
    } 
}
