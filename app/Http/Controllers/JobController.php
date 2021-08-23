<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JobController extends Controller
{
    //
    public function index ()
    {
        return view('components.new_job_main');
    }

    public function request_job (Request $req){

        $user_id = auth()->user()->id;

        $data = $req->input();

        // return $data;
        return redirect()->route('new_job')->with('status', 'updated succesfully');
        // return redirect()->back()->with('alert', 'Updated!');
        // return redirect('/new_job')->with('status', 'Profile updated!');
    }

    public function tracker(){
        return view('components.job_tracker_main');
    }
}
