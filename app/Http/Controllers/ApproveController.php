<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\pendingMeeting;

class ApproveController extends Controller
{
    //
    public function index ()
    {
        return view('components.approve_meeting_main',[
            'pendingMeeting' => PendingMeeting::class
        ]);
    }

    public function index_request ()
    {
        return view('components.request_meeting_main',[
            'requestMeeting' => PendingMeeting::class
        ]);
    }
    
}
