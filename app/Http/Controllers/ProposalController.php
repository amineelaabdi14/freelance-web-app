<?php

namespace App\Http\Controllers;
use App\Models\Proposal;
use App\Models\Service;
use Illuminate\Http\Request;

class ProposalController extends Controller
{
    public function create(Service $service, Request $request){
       $proposal= Proposal::create([
        'service_id'=>$service->id,
        'user_id'=>auth()->user()->id,
        'message'=>$request->message,
        'phone'=>$request->phone,
    ]);
        return redirect()->back();
    }

    public function markProposal(Proposal $proposal){
        $proposal->status=1;
        $proposal->save();
        return redirect()->back();
    }

    public function deleteProposal(Proposal $proposal){
        $proposal->delete();
        return redirect()->back();
    }
}
