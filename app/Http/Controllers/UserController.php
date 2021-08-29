<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\User as User;
use App\Models\UsersDetail as UsersDetail;


use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\UpdatesUserPasswords;


class UserController extends Controller
{
    public function index_view ()
    {
        return view('pages.user.user-data', [
            'user' => User::class
        ]);
    }

    public function profile (){

        return view('components.profile_main', [
            'UsersDetail' => UsersDetail::class
        ]);
        
    }

    public function index_view_new (){
        return view('components.user_new_main');
    }

    public function createUser(Request $req){

        $data = $req->input();

        $user_id = auth()->user()->id;

        // check user if created
        $exists = User::where('email', $req->email)->exists();

        if(!$exists){
            $currentdt = date('d-m-Y H:i:s');

            // update marketing jti db 
            $createUser = new User;

            $createUser->email = $req->email;
            $createUser->name = $req->name;
            $createUser->role = $req->role;
            $createUser->position = $req->position;
            
            $createUser->forceFill([
                'password' => Hash::make($req['password']),
            ]);


            $createUser->save();
        }

        return redirect()->route('user.new')->with('success','Successfully created new user!');
    }

    public function profile_edit($id){

        
        $uname = auth()->user()->name;
        $currentdt = date('Y-m-d H:i:s');
        
        // $leavesDetail = LeaveApplication::where('id', $id)->first();

        return view('components.profile_main');

                // return redirect()->route('leaves_edit',$id);
    }

    public function updateProfile(Request $req){
        $user_id = auth()->user()->id;
        

        $data = $req->input();

     
        $currentdt = date('d-m-Y H:i:s');


       
        $exists = UsersDetail::where('user_id', $user_id)->exists();
        if(!$exists){
            $currentdt = date('d-m-Y H:i:s');
            
            $leaves = UsersDetail::create([
                'user_id' => $user_id,
                'company_name' => $req->company_name,
                'branch' => $req->branch,
                'department' => $req->department,
                'address' => $req->address,
                'postcode' => $req->postcode,
                'contact_no' => $req->mobile_no,
                'created_at' => $currentdt,
                'updated_at' => $currentdt,
               
                ]);

            
    }   
    $update = UsersDetail::where('user_id', $user_id)
    ->update([
        'company_name' => $req->company_name,
        'branch' => $req->branch,
        'department' => $req->department,
        'address' => $req->address,
        'postcode' => $req->postcode,
        'contact_no' => $req->mobile_no,
        'updated_at' => $currentdt,
   
    ]);






        return redirect()->route('profile')->with('success','Successfully updated information!');
    }


}
