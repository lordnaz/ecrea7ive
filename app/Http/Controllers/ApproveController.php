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

    public function meeting_edit($id){

        
        $uname = auth()->user()->name;
        $currentdt = date('Y-m-d H:i:s');
        
        $meetingEdit = PendingMeeting::where('id', $id)->first();

        return view('components.meeting_edit_main', compact('meetingEdit'));


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

    public function updateMeeting(Request $req){
        $user_id = auth()->user()->id;
        

        $data = $req->input();

     
        $currentdt = date('d-m-Y H:i:s');
       
        $dateRange = explode( '-', $req->datetimes );

        $start_date = $dateRange[0]."-".$dateRange[1]."-".$dateRange[2];

        // echo 'tet';
        $update = PendingMeeting::where('id', $req->id)
        ->update([

        'meeting_subject' => $req->meeting_subject,
        'description' => $req->description,
        'department' => $req->department,
        'startdate' => $req->datetimes,
       
        // 'startdate'=> $start_date,
        // 'enddate'=>$end_date,
        'updated_at' => $currentdt,

       
        ]);

        return redirect()->route('approve_meeting')->with('success','Successfully updated information!');
    }

    
    
}
