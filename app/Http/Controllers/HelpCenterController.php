<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelpCenterController extends Controller
{
    //
    public function index ()
    {
        return view('components.help_center_main');
    }


    
}
