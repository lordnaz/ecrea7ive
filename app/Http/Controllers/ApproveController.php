<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\PendingMeeting;
use App\Models\User;

class ApproveController extends Controller
{
    //
    public function index ()
    {



        $pendingMeeting = PendingMeeting::orderBy('id', 'desc')
                                    ->join('users', 'users.id', '=', 'meetings.user_id')
                                    ->select('users.name' , 'meetings.*')
                                    ->get();
        
        return view('components.approve_meeting_main', compact('pendingMeeting'));

    }


    public function appMeeting($id){

        
        $uname = auth()->user()->name;
        $currentdt = date('Y-m-d H:i:s');
        
        // update job status
        PendingMeeting::where('id', $id)
                ->update([
                    'job_status' => "APPROVED", 
                    'approved_by'=>$uname,
                    'updated_at' => $currentdt
                ]);



                return redirect()->route('approve_meeting')->with('success','Successfully approved meeting request!');
    }

    public function rejMeeting($id){

        
        $uname = auth()->user()->name;
        $currentdt = date('Y-m-d H:i:s');
        
        // update job status
        PendingMeeting::where('id', $id)
                ->update([
                    'job_status' => "REJECTED", 
                    'approved_by'=>$uname,
                    'updated_at' => $currentdt
                ]);



                return redirect()->route('approve_meeting')->with('error','Meeting request rejected!');
    }



    public function index_request ()
    {
        return view('components.request_meeting_main',[
            'requestMeeting' => PendingMeeting::class
        ]);
    }

    
    
}
