<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use Repsonse;
use Illuminate\Support\Facades\Storage;


class HelpCenterController extends Controller
{
    //
    public function index ()
    {
        return view('components.help_center_main');
    }

    public function downloadfile ()
    {
        // $filename = 'UserManual.docx';
        // $filepath = storage_path('public/UserManual.docx');
        // storage_path('app')
        // $filepath =  storage_path('\app\UserManual.docx');

        // echo $filepath ;
        // return Storage::download($filepath);
        // return view('components.help_center_main');

        // $filename = 'UserManual.docx';
        // // $path = storage_path()."/".$filename;
        // $path = public_path('storage/' . $filename);
        // Storage::disk('public')->get($path);
        // dd($contents);

        $myFile = storage_path("app/public/UserManual.docx");


    	return response()->download($myFile);

        
    }


    
}
