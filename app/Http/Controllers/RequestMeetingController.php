<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\PendingMeeting;

class RequestMeetingController extends Controller
{
    //
    public function index ()
    {

        
        $user_id = auth()->user()->id;

        // print $user_id;
        
        if($user_id == $user_id){
            $listMeeting = PendingMeeting::orderBy('id', 'desc')->where('user_id', $user_id)->get();
        }else{
            $listMeeting = PendingMeeting::orderBy('id', 'desc')->get();
        }
        
        return view('components.request_meeting_main', compact('listMeeting'));
        

        
    }



    public function requestMeeting(Request $req){
        $user_id = auth()->user()->id;
        $data = $req->input();

     
        $currentdt = date('d-m-Y H:i:s');
       
        $dateRange = explode( '-', $req->datetimes);

        $start_date = $dateRange[0]."-".$dateRange[1]."-".$dateRange[2];
        $end_date = $dateRange[3]."-".$dateRange[4]."-".$dateRange[5];

        $status = 'PENDING';
        $requestMeeting = PendingMeeting::create([
            'user_id' => $user_id,
            'meeting_subject' => $req->meeting_subject,
            'description' => $req->description,
            'department' => $req->department,
            'startdate' => $req->datetimes,
            'job_status'=>$status,
            'startdate'=> $start_date,
            'enddate'=>$end_date,
            'updated_at' => $currentdt,
            'created_at' => $currentdt,
           
            ]);


        return redirect()->route('request_meeting')->with('success','Successfully send a meeting request!');
    }




    public function render()
    {
        return view('components.leaves_edit');
    }

    
    
}
