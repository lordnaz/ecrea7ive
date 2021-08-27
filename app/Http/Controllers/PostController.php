<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\TrixAttachment;
use App\Models\TrixRichText;
use App\Models\Ticket;

class PostController extends Controller
{
    //
    public function post_message(Request $req){

        $ticket_id = $req->post_ticket_id;

        // insert new message 
        Post::create([
            'poster_name' => auth()->user()->name,
            'role' => auth()->user()->role,
            'ticket_id' => $ticket_id,
            'created_by' => auth()->user()->id,
            'post-trixFields' => request('post-trixFields'),
            'attachment-post-trixFields' => request('attachment-post-trixFields')
        ]);

        // retrieve post trix message data 
        // $post_data = TrixRichText::orderBy('id', 'desc')
        //                             ->join('posts', 'posts.id', '=', 'trix_rich_texts.model_id')
        //                             ->where('posts.ticket_id', $ticket_id)
        //                             ->select('posts.poster_name', 'posts.role' , 'trix_rich_texts.*')
        //                             ->get();

        // retrieve ticket collection data 
        // $ticket_collection = Ticket::where('ticket_id', $ticket_id)->first();

        // return view('components.job_tracker_main', compact('post_data', 'ticket_collection', 'ticket_id'));

        return redirect()->route('ticket', $ticket_id);
    }
}
