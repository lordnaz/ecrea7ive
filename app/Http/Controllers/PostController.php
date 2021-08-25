<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\TrixAttachment;
use App\Models\TrixRichText;

class PostController extends Controller
{
    //
    public function post_message(){

        Post::create([
            'poster_name' => auth()->user()->name,
            'role' => auth()->user()->role,
            'created_by' => auth()->user()->id,
            'post-trixFields' => request('post-trixFields'),
            'attachment-post-trixFields' => request('attachment-post-trixFields')
        ]);

        $post_data = TrixRichText::orderBy('id', 'desc')
                                    ->join('posts', 'posts.id', '=', 'trix_rich_texts.model_id')
                                    ->select('posts.poster_name', 'posts.role' , 'trix_rich_texts.*')
                                    ->get();

        // return $post_data;

        // die();

        // return view('components.job_tracker_main', compact('post_data'));

        return redirect('tracker');
    }
}
