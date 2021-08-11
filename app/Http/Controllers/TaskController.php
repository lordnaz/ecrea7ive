<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Migration;

class TaskController extends Controller
{
    //
    public function index ()
    {
        return view('dashboard', [
            'migration' => Migration::class
        ]);
    }
}
