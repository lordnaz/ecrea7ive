<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\LeaveApplication;

class RegisterLeavesController extends Controller
{
    //
    public function index ()
    {

        
        $user_id = auth()->user()->id;
        $role = auth()->user()->role;

        // print $user_id;
        
        if($user_id == $user_id &&($role =='admin')){
            $leavesApplication = LeaveApplication::orderBy('user_id', 'desc')->where('user_id', $user_id)->get();
        }else{
            $leavesApplication = LeaveApplication::orderBy('user_id', 'desc')->get();
        }
        
        return view('components.register_leaves_main', compact('leavesApplication'));
        

        
    }

    public function index_2 ()
    {

        
        
        
        return view('components.leaves_edit_main');
        

        
    }

    public function updateUser ()
    {
        $this->resetErrorBag();
        $this->validate();

        leaveApplication::query()
            ->where('id', $this->userId)
            ->update([
                "name" => $this->user->name,
                "email" => $this->user->email,
            ]);

        $this->emit('saved');
    }

    

    public function requestleaves(Request $req){
        $user_id = auth()->user()->id;
        

        $data = $req->input();

     
        $currentdt = date('d-m-Y H:i:s');
       
        $dateRange = explode( '-', $req->date_range );

        $start_date = $dateRange[0]."-".$dateRange[1]."-".$dateRange[2];
        $end_date = $dateRange[3]."-".$dateRange[4]."-".$dateRange[5];


        
        $leaves = LeaveApplication::create([
        'user_id' => $user_id,
        'name' => $req->fullname,
        'startdate'=> $start_date,
        'enddate'=>$end_date,
        'updated_at' => $currentdt,
        'created_at' => $currentdt,
       
        ]);
        
        // return back()->with('success','Item created successfully!');
        return redirect()->route('register_leaves')->with('success','Successfully registered leave!');
        
    }




    public function editLeaves($id){

        $uuid = auth()->user()->id;
        $uname = auth()->user()->name;
        $urole = auth()->user()->role;
        $currentdt = date('Y-m-d H:i:s');
        
       


        return redirect()->route('editLeaves', $id);

    }

    public function leaves_edit($id){

        
        $uname = auth()->user()->name;
        $currentdt = date('Y-m-d H:i:s');
        
        $leavesDetail = LeaveApplication::where('id', $id)->first();

        return view('components.leaves_edit_main', compact('leavesDetail'));

                // return redirect()->route('leaves_edit',$id);
    }

    public function render()
    {
        return view('components.leaves_edit');
    }

    
    public function updateLeaves(Request $req){
        $user_id = auth()->user()->id;
        

        $data = $req->input();

     
        $currentdt = date('d-m-Y H:i:s');
       
        $dateRange = explode( '-', $req->date_range );

        $start_date = $dateRange[0]."-".$dateRange[1]."-".$dateRange[2];
        $end_date = $dateRange[3]."-".$dateRange[4]."-".$dateRange[5];

        // echo 'tet';
        $update = LeaveApplication::where('id', $req->id)
        ->update([
        // $leaves = LeaveApplication::create([
        'name' => $req->fullname,
        'startdate'=> $start_date,
        'enddate'=>$end_date,
        'updated_at' => $currentdt,
       
        ]);

        return redirect()->route('register_leaves')->with('success','Successfully updated information!');
    }

    public function delete($id)
    {

        $delete = LeaveApplication::where('id', $id)->delete();
        
        return redirect()->route('register_leaves')->with('error','Item deleted!');
    }
    

    
    
}
