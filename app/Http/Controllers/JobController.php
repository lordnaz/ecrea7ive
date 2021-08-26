<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Exception; 

use App\Models\Post;
use App\Models\TrixAttachment;
use App\Models\TrixRichText;

use App\Models\Ticket;

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

        try {

            $random_string = chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90));
            $random_number = rand(1000000000,9999999999);

            $ticket_id = $random_string.$random_number;
            $currentdt = date('d-m-Y H:i:s');

            // ticket status 
            // 1. CREATED
            // 2. ACKNOWLEDGE_BY_ADMIN - ACKNOWLEDGE
            // 3. ITEM_APPROVED_BY_CLIENT - APPROVED
            // 4. ITEM_RECEIVED_BY_CLIENT - RECEIVED
            // 5. FINISHED
            // 6. CANCELLED

            $urgent = 'Normal';

            if($req->job_status == 'on'){
                $urgent = 'Urgent';
            }
            
            // creating ticket 
            $ticket = Ticket::create([
                'ticket_id' => $ticket_id,
                'ticket_status' => 'CREATED',
                'job_name' => $req->job_name,
                'job_status' => $urgent,
                'job_type' => $req->job_type,
                'job_name' => $req->job_name,
                'references' => $req->references,
                'description' => $req->description,
                'delivery_type' => $req->delivery_type,
                'dateline' => $req->dateline,
                'pic_name' => $req->pic_name,
                'pic_email' => $req->pic_email,
                'pic_contact_no' => $req->pic_contact_no,
                'pic_office_no' => $req->pic_office_no,
                'pic_address' => $req->pic_address,
                'pic_postcode' => $req->pic_postcode,
                'created_by' => auth()->user()->id,
                'created_at' => $currentdt,
                'updated_at' => $currentdt,
            ]);

            return redirect()->route('ticket', ['ticket_id' => $ticket_id]);
            
        } catch (Exception $e) {

            $reason = 'Failed to create job! Reason: '.$e->getMessage();

            // kalau nak redirect back with status 
            return redirect()->route('new_job')->with('status', $reason);
        }
 
    }

    public function ticket($ticket_id){

        $post_data = TrixRichText::orderBy('id', 'desc')
                                    ->join('posts', 'posts.id', '=', 'trix_rich_texts.model_id')
                                    ->where('posts.ticket_id', $ticket_id)
                                    ->select('posts.poster_name', 'posts.role' , 'trix_rich_texts.*')
                                    ->get();
        
        $ticket_collection = Ticket::where('ticket_id', $ticket_id)->first();

        return view('components.job_tracker_main', compact('post_data', 'ticket_collection', 'ticket_id'));


    }

    public function tracker(){

        $ticket_id = "IJM5559682865";

        $post_data = TrixRichText::orderBy('id', 'desc')
                                    ->join('posts', 'posts.id', '=', 'trix_rich_texts.model_id')
                                    ->where('posts.ticket_id', $ticket_id)
                                    ->select('posts.poster_name', 'posts.role' , 'trix_rich_texts.*')
                                    ->get();

        $ticket_collection = Ticket::where('ticket_id', $ticket_id)->first();

        return view('components.job_tracker_main', compact('post_data', 'ticket_collection', 'ticket_id'));
    }

}
