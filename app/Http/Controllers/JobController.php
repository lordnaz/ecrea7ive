<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Exception; 
use Carbon\Carbon;
use DateTime;

use App\Models\User;
use App\Models\Post;
use App\Models\TrixAttachment;
use App\Models\TrixRichText;
use App\Models\Ticket;

use App\Mail\TicketStatusEmail;
use Illuminate\Support\Facades\Mail;

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
            // 3. REVIEW SESSION - REVIEW
            // 4. ITEM_APPROVED_BY_CLIENT - APPROVED
            // 5. ITEM_RECEIVED_BY_CLIENT - RECEIVED
            // 6. CLOSED
            // 7. CANCELLED

            $urgent = 'Normal';

            if($req->job_status == 'on'){
                $urgent = 'Urgent';
            }

            $namejob = $req->job_name;

            if($req->job_name == "Others"){
                $namejob = $req->others;
            }
            
            // creating ticket 
            $ticket = Ticket::create([
                'ticket_id' => $ticket_id,
                'ticket_status' => 'CREATED',
                'job_name' => $namejob,
                'job_status' => $urgent,
                'job_type' => $req->job_type,
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
                'pic_company_name' => $req->pic_company_name,
                'pic_branch' => $req->pic_branch,
                'pic_department' => $req->pic_department,
                'pic_hod' => $req->pic_hod,
                'created_by' => auth()->user()->id,
                'created_at' => $currentdt,
                'updated_at' => $currentdt,
            ]);

            // Email Section 
            // $ticketObj = Ticket::where('ticket_id', $ticket_id)->first();

            // $receiver_name = $ticketObj['pic_name'];
            // $receiver_email = $ticketObj['pic_email'];
            // $job_status = $ticketObj['ticket_status'];

            $details = [
                'pic_name' => $req->pic_name,
                'pic_email' => $req->pic_email,
                'ticket_id' => $ticket_id,
                'ticket_status' => 'CREATED'
            ];

            // $test_email = 'nazrul.workspace@gmail.com';
            $adminObj = User::where('role', 'admin')
                                ->orWhere('role', 'superadmin')
                                ->get();

            Mail::to($req->pic_email)
                    ->send(new TicketStatusEmail($details));

            foreach ($adminObj as $data) {
                $admin_email = $data['email'];
                // $printer_email = auth()->user()->find($printer_id)->email;

                Mail::to($admin_email)
                    ->send(new TicketStatusEmail($details));
            }

            
            // End of Email Section 

            return redirect()->route('ticket', ['ticket_id' => $ticket_id]);
            
        } catch (Exception $e) {

            $reason = 'Failed to create job! Reason: '.$e->getMessage();

            // kalau nak redirect back with status 
            return redirect()->route('new_job')->with('status', $reason);
        }
 
    }

    public function ticket($ticket_id){

        $urole = auth()->user()->role;

        if($urole == 'printer'){

            $assigned_dt = TrixRichText::join('posts', 'posts.id', '=', 'trix_rich_texts.model_id')
                                        ->where('posts.ticket_id', $ticket_id)
                                        ->where('field', 'printer')
                                        ->select('posts.created_at')
                                        ->first();

            $assigned_dt = Carbon::parse($assigned_dt->created_at)->format('Y-m-d H:i:s');


            $post_data = TrixRichText::orderBy('id', 'desc')
                                    ->join('posts', 'posts.id', '=', 'trix_rich_texts.model_id')
                                    ->where('posts.ticket_id', $ticket_id)
                                    ->where('posts.created_at', '>=', $assigned_dt)
                                    ->select('posts.poster_name', 'posts.role' , 'trix_rich_texts.*')
                                    ->get();


        }else{
            $post_data = TrixRichText::orderBy('id', 'desc')
                                    ->join('posts', 'posts.id', '=', 'trix_rich_texts.model_id')
                                    ->where('posts.ticket_id', $ticket_id)
                                    ->select('posts.poster_name', 'posts.role' , 'trix_rich_texts.*')
                                    ->get();
        }
        
        $ticket_collection = Ticket::where('ticket_id', $ticket_id)->first();

        $printers = User::where('role','printer')
                            ->get();

        return view('components.job_tracker_main', compact('post_data', 'ticket_collection', 'ticket_id', 'printers'));


    }

    public function tracker(){

        $ticket_id = "IJM5559682865";

        $post_data = TrixRichText::orderBy('id', 'desc')
                                    ->join('posts', 'posts.id', '=', 'trix_rich_texts.model_id')
                                    ->where('posts.ticket_id', $ticket_id)
                                    ->select('posts.poster_name', 'posts.role' , 'trix_rich_texts.*')
                                    ->get();

        $ticket_collection = Ticket::where('ticket_id', $ticket_id)->first();

        $printers = User::where('role','printer')
                            ->get();

        return view('components.job_tracker_main', compact('post_data', 'ticket_collection', 'ticket_id', 'printers'));
    }

    public function acknowledged($ticket_id){

        $uuid = auth()->user()->id;
        $uname = auth()->user()->name;
        $urole = auth()->user()->role;
        $currentdt = date('Y-m-d H:i:s');
        
        // update job status
        Ticket::where('ticket_id', $ticket_id)
                ->update([
                    'ticket_status' => "ACKNOWLEDGE", 
                    'updated_at' => $currentdt
                ]);

        $posts = Post::create([
            'poster_name' => $uname,
            'role' => $urole,
            'ticket_id' => $ticket_id,
            'created_by' => $uuid
        ]);

        $postsId = $posts->id;

        // return $postsId;

        // die();

        TrixRichText::create([
            'field' => 'system',
            'model_type' => 'system',
            'model_id' => $postsId,
            'content' => '<div><i>[System Alert]&nbsp;</i> Ticket has been <span class="text-success">Acknowledged</span> by '.$uname.'</div>'
        ]);


        // Email Section 
        $ticketObj = Ticket::where('ticket_id', $ticket_id)->first();

        $receiver_name = $ticketObj['pic_name'];
        $receiver_email = $ticketObj['pic_email'];
        $job_status = $ticketObj['ticket_status'];

        $details = [
            'pic_name' => $receiver_name,
            'pic_email' => $receiver_email,
            'ticket_id' => $ticket_id,
            'ticket_status' => $job_status
        ];

        // $test_email = 'nazrul.workspace@gmail.com';

        Mail::to($receiver_email)->send(new TicketStatusEmail($details));
        // End of Email Section 


        return redirect()->route('ticket', $ticket_id);

    }



    public function prepared($ticket_id){

        $uuid = auth()->user()->id;
        $uname = auth()->user()->name;
        $urole = auth()->user()->role;
        $currentdt = date('Y-m-d H:i:s');
        
        // update job status
        Ticket::where('ticket_id', $ticket_id)
                ->update([
                    'ticket_status' => "REVIEW", 
                    'updated_at' => $currentdt
                ]);

        $posts = Post::create([
            'poster_name' => $uname,
            'role' => $urole,
            'ticket_id' => $ticket_id,
            'created_by' => $uuid
        ]);

        $postsId = $posts->id;

        TrixRichText::create([
            'field' => 'system',
            'model_type' => 'system',
            'model_id' => $postsId,
            'content' => '<div><i>[System Alert]&nbsp;</i> Artwork has been prepared by '.$uname.'. Review session <b class="text-primary">Undergoing</b></div>'
        ]);


        // Email Section 
        $ticketObj = Ticket::where('ticket_id', $ticket_id)->first();

        $receiver_name = $ticketObj['pic_name'];
        $receiver_email = $ticketObj['pic_email'];
        $job_status = $ticketObj['ticket_status'];

        $details = [
            'pic_name' => $receiver_name,
            'pic_email' => $receiver_email,
            'ticket_id' => $ticket_id,
            'ticket_status' => $job_status
        ];

        // $test_email = 'nazrul.workspace@gmail.com';

        Mail::to($receiver_email)->send(new TicketStatusEmail($details));
        // End of Email Section 

        return redirect()->route('ticket', $ticket_id);
    }



    public function approved($ticket_id){

        $uuid = auth()->user()->id;
        $uname = auth()->user()->name;
        $urole = auth()->user()->role;
        $currentdt = date('Y-m-d H:i:s');
        
        // update job status
        Ticket::where('ticket_id', $ticket_id)
                ->update([
                    'ticket_status' => "APPROVED", 
                    'updated_at' => $currentdt
                ]);

        $posts = Post::create([
            'poster_name' => $uname,
            'role' => $urole,
            'ticket_id' => $ticket_id,
            'created_by' => $uuid
        ]);

        $postsId = $posts->id;

        TrixRichText::create([
            'field' => 'system',
            'model_type' => 'system',
            'model_id' => $postsId,
            'content' => '<div><i>[System Alert]&nbsp;</i> Artwork has been <span class="text-primary">Approved</span> by client. Please proceed with delivery/collection tasks.</div>'
        ]);

        // Email Section 
        $ticketObj = Ticket::where('ticket_id', $ticket_id)->first();

        $receiver_name = $ticketObj['pic_name'];
        $receiver_email = $ticketObj['pic_email'];
        $job_status = $ticketObj['ticket_status'];

        $details = [
            'pic_name' => $receiver_name,
            'pic_email' => $receiver_email,
            'ticket_id' => $ticket_id,
            'ticket_status' => $job_status
        ];

        $admin_email = auth()->user()->email;
        // $test_email = 'nazrul.workspace@gmail.com';

        $adminObj = User::where('role', 'admin')
                        ->orWhere('role', 'superadmin')
                        ->get();

        foreach ($adminObj as $data) {
            $admin_email = $data['email'];
            // $printer_email = auth()->user()->find($printer_id)->email;

            Mail::to($admin_email)
                ->send(new TicketStatusEmail($details));
        }

        // End of Email Section 

        return redirect()->route('ticket', $ticket_id);
    }



    public function sent($ticket_id){

        $uuid = auth()->user()->id;
        $uname = auth()->user()->name;
        $urole = auth()->user()->role;
        $currentdt = date('Y-m-d H:i:s');
        
        // update job status
        Ticket::where('ticket_id', $ticket_id)
                ->update([
                    'ticket_status' => "SENT", 
                    'updated_at' => $currentdt
                ]);

        $posts = Post::create([
            'poster_name' => $uname,
            'role' => $urole,
            'ticket_id' => $ticket_id,
            'created_by' => $uuid
        ]);

        $postsId = $posts->id;

        // return $postsId;

        // die();

        TrixRichText::create([
            'field' => 'system',
            'model_type' => 'system',
            'model_id' => $postsId,
            'content' => '<div><i>[System Alert]&nbsp;</i> Artwork has been <span class="text-success">Delivered</span> by '.$uname.'. Waiting client to receive.</div>'
        ]);


        // Email Section 
        $ticketObj = Ticket::where('ticket_id', $ticket_id)->first();

        $receiver_name = $ticketObj['pic_name'];
        $receiver_email = $ticketObj['pic_email'];
        $job_status = $ticketObj['ticket_status'];

        $details = [
            'pic_name' => $receiver_name,
            'pic_email' => $receiver_email,
            'ticket_id' => $ticket_id,
            'ticket_status' => $job_status
        ];

        // $test_email = 'nazrul.workspace@gmail.com';

        Mail::to($receiver_email)->send(new TicketStatusEmail($details));
        // End of Email Section 


        return redirect()->route('ticket', $ticket_id);

    }


    public function received($ticket_id){

        $uuid = auth()->user()->id;
        $uname = auth()->user()->name;
        $urole = auth()->user()->role;
        $currentdt = date('Y-m-d H:i:s');
        
        // update job status
        Ticket::where('ticket_id', $ticket_id)
                ->update([
                    'ticket_status' => "RECEIVED", 
                    'updated_at' => $currentdt
                ]);

        $posts = Post::create([
            'poster_name' => $uname,
            'role' => $urole,
            'ticket_id' => $ticket_id,
            'created_by' => $uuid
        ]);

        $postsId = $posts->id;

        TrixRichText::create([
            'field' => 'system',
            'model_type' => 'system',
            'model_id' => $postsId,
            'content' => '<div><i>[System Alert]&nbsp;</i> Item has been <span class="text-primary">Received</span> by the client.</div>'
        ]);

        // Email Section 
        $ticketObj = Ticket::where('ticket_id', $ticket_id)->first();

        $receiver_name = $ticketObj['pic_name'];
        $receiver_email = $ticketObj['pic_email'];
        $job_status = $ticketObj['ticket_status'];

        $details = [
            'pic_name' => $receiver_name,
            'pic_email' => $receiver_email,
            'ticket_id' => $ticket_id,
            'ticket_status' => $job_status
        ];

        $adminObj = User::where('role', 'admin')
                        ->orWhere('role', 'superadmin')
                        ->get();

        foreach ($adminObj as $data) {
            $admin_email = $data['email'];
            // $printer_email = auth()->user()->find($printer_id)->email;

            Mail::to($admin_email)
                ->send(new TicketStatusEmail($details));
        }
        // End of Email Section 

        return redirect()->route('ticket', $ticket_id);
    }



    public function closed($ticket_id){

        $uuid = auth()->user()->id;
        $uname = auth()->user()->name;
        $urole = auth()->user()->role;
        $currentdt = date('Y-m-d H:i:s');
        
        // update job status
        Ticket::where('ticket_id', $ticket_id)
                ->update([
                    'ticket_status' => "CLOSED", 
                    'active' => false, 
                    'updated_at' => $currentdt
                ]);

        $posts = Post::create([
            'poster_name' => $uname,
            'role' => $urole,
            'ticket_id' => $ticket_id,
            'created_by' => $uuid
        ]);

        $postsId = $posts->id;

        TrixRichText::create([
            'field' => 'system',
            'model_type' => 'system',
            'model_id' => $postsId,
            'content' => '<div><i>[System Alert]&nbsp;</i>Ticket <span class="text-danger">Closed</span> by Admin. Thank you for using <b>e-Crea7ive</b> services.</div>'
        ]);

        // Email Section 
        $ticketObj = Ticket::where('ticket_id', $ticket_id)->first();

        $receiver_name = $ticketObj['pic_name'];
        $receiver_email = $ticketObj['pic_email'];
        $job_status = $ticketObj['ticket_status'];

        $details = [
            'pic_name' => $receiver_name,
            'pic_email' => $receiver_email,
            'ticket_id' => $ticket_id,
            'ticket_status' => $job_status
        ];

        // $test_email = 'nazrul.workspace@gmail.com';

        Mail::to($receiver_email)->send(new TicketStatusEmail($details));

        $adminObj = User::where('role', 'admin')
                        ->orWhere('role', 'superadmin')
                        ->get();

        foreach ($adminObj as $data) {
            $admin_email = $data['email'];
            // $printer_email = auth()->user()->find($printer_id)->email;

            Mail::to($admin_email)
                ->send(new TicketStatusEmail($details));
        }

        // End of Email Section 

        return redirect()->route('ticket', $ticket_id);
    }


    public function assign_printer(Request $req, $ticket_id){

        $data = $req->input();

        // return $ticket_id;

        // die();

        $printer_id = $req->printer_assign;
        $printer_name = auth()->user()->find($printer_id)->name;
        $uuid = auth()->user()->id;
        $uname = auth()->user()->name;
        $urole = auth()->user()->role;
        $currentdt = date('Y-m-d H:i:s');

        // update printer assignee
        $ticket = Ticket::where('ticket_id', $ticket_id)
                ->update([
                    'printer' => $printer_id, 
                    'updated_at' => $currentdt
                ]);

        // update alert system message
        $posts = Post::create([
            'poster_name' => $uname,
            'role' => $urole,
            'ticket_id' => $ticket_id,
            'created_by' => $uuid
        ]);

        $postsId = $posts->id;

        TrixRichText::create([
            'field' => 'printer',
            'model_type' => 'printer',
            'model_id' => $postsId,
            'content' => '<div><i>[System Alert]&nbsp;</i>'.$uname.' has assign printing job to <b>'.$printer_name.'</b>.</div>'
        ]);

        // Email Section 
        $ticketObj = Ticket::where('ticket_id', $ticket_id)->first();

        $receiver_name = $ticketObj['pic_name'];
        $receiver_email = $ticketObj['pic_email'];
        $job_status = $ticketObj['ticket_status'];

        $details = [
            'pic_name' => $receiver_name,
            'pic_email' => $receiver_email,
            'ticket_id' => $ticket_id,
            'ticket_status' => $job_status
        ];

        // $test_email = 'nazrul.workspace@gmail.com';
        $admin_email = auth()->user()->email;
        $printer_email = auth()->user()->find($printer_id)->email;

        Mail::to($printer_email)
            ->cc($admin_email)
            ->send(new TicketStatusEmail($details));
        // End of Email Section 

        return redirect()->route('ticket', $ticket_id);

    }

    public function cancel_job($ticket_id){

        $uuid = auth()->user()->id;
        $uname = auth()->user()->name;
        $urole = auth()->user()->role;
        $currentdt = date('Y-m-d H:i:s');
        
        // update job status
        Ticket::where('ticket_id', $ticket_id)
                ->update([
                    'ticket_status' => "CANCELLED", 
                    'active' => false, 
                    'updated_at' => $currentdt
                ]);

        $posts = Post::create([
            'poster_name' => $uname,
            'role' => $urole,
            'ticket_id' => $ticket_id,
            'created_by' => $uuid
        ]);

        $postsId = $posts->id;

        TrixRichText::create([
            'field' => 'system',
            'model_type' => 'system',
            'model_id' => $postsId,
            'content' => '<div><i>[System Alert]&nbsp;</i>Job has been <span class="text-danger">Cancelled</span> by Client.</div>'
        ]);

        // Email Section 
        $ticketObj = Ticket::where('ticket_id', $ticket_id)->first();

        $receiver_name = $ticketObj['pic_name'];
        $receiver_email = $ticketObj['pic_email'];
        $job_status = $ticketObj['ticket_status'];

        $details = [
            'pic_name' => $receiver_name,
            'pic_email' => $receiver_email,
            'ticket_id' => $ticket_id,
            'ticket_status' => $job_status
        ];

        // $test_email = 'nazrul.workspace@gmail.com';
        // $admin_email = auth()->user()->email;
        // $printer_email = auth()->user()->find($printer_id)->email;

        Mail::to($receiver_email)
            ->send(new TicketStatusEmail($details));

        $adminObj = User::where('role', 'admin')
            ->orWhere('role', 'superadmin')
            ->get();

        foreach ($adminObj as $data) {
            $admin_email = $data['email'];
            // $printer_email = auth()->user()->find($printer_id)->email;

            Mail::to($admin_email)
                ->send(new TicketStatusEmail($details));
        }
            
        // End of Email Section 

        return redirect()->route('ticket', $ticket_id);

    }

    public function reactivate($ticket_id){
        $uuid = auth()->user()->id;
        $uname = auth()->user()->name;
        $urole = auth()->user()->role;
        $currentdt = date('Y-m-d H:i:s');
        
        // update job status
        Ticket::where('ticket_id', $ticket_id)
                ->update([
                    'ticket_status' => "CREATED", 
                    'active' => true, 
                    'updated_at' => $currentdt
                ]);

        $posts = Post::create([
            'poster_name' => $uname,
            'role' => $urole,
            'ticket_id' => $ticket_id,
            'created_by' => $uuid
        ]);

        $postsId = $posts->id;

        TrixRichText::create([
            'field' => 'system',
            'model_type' => 'system',
            'model_id' => $postsId,
            'content' => '<div><i>[System Alert]&nbsp;</i>Job has been <span class="text-success">Reactivated</span> by '.$uname.'.</div>'
        ]);

        // Email Section 
        $ticketObj = Ticket::where('ticket_id', $ticket_id)->first();

        $receiver_name = $ticketObj['pic_name'];
        $receiver_email = $ticketObj['pic_email'];
        $job_status = $ticketObj['ticket_status'];

        $details = [
            'pic_name' => $receiver_name,
            'pic_email' => $receiver_email,
            'ticket_id' => $ticket_id,
            'ticket_status' => $job_status
        ];

        Mail::to($receiver_email)
            ->send(new TicketStatusEmail($details));

        $adminObj = User::where('role', 'admin')
            ->orWhere('role', 'superadmin')
            ->get();

        foreach ($adminObj as $data) {
            $admin_email = $data['email'];
            // $printer_email = auth()->user()->find($printer_id)->email;

            Mail::to($admin_email)
                ->send(new TicketStatusEmail($details));
        }
        
        // End of Email Section 

        return redirect()->route('ticket', $ticket_id);
    }
    

}
