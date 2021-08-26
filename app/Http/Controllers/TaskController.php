<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Ticket;

class TaskController extends Controller
{
    //
    public function index ()
    {
        // return view('dashboard', [
        //     'migration' => Migration::class
        // ]);
        // retrieve ticket collection data 

        $roles = auth()->user()->role;
        $created_by = auth()->user()->id;
        
        if($roles == "user"){
            $collection = Ticket::orderBy('id', 'desc')->where('created_by', $created_by)->get();
        }else if($roles == "printer"){
            $collection = Ticket::orderBy('id', 'desc')->get();
        }else{
            $collection = Ticket::orderBy('id', 'desc')->get();
        }

        return view('dashboard', compact('collection'));
    }
}
