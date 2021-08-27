<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\leaveApplication;

class RegisterLeavesController extends Controller
{
    //
    public function index ()
    {

        return view('components.register_leaves_main', [
            'leaveApplication' => LeaveApplication::class
        ]);
        

        
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

    public function editLeaves($ref_id){

        $data = leaveApplication::where('id', $ref_id)
                                    ->get()
                                    ->first();

        return view('pages.leaves.leaves-edit_main', compact('data'));

        // return $ref_id;
        // die();

    }

    public function render()
    {
        return view('livewire.leaves-edit');
    }

    
    
}
