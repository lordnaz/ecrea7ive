<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\User as User;


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
        return view('components.profile_main');
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

        return redirect()->route('dashboard');
    }
}
