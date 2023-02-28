<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    function saveComment(Request $request)
    {
        //return $request;
        $comment = new Comment();
        $comment->blog_id = $request ->blog_id;
        $comment->user_id = $request ->author_id;
        $comment->user_name = $request ->author_name;
        $comment->comment = $request ->comment_text;
        $comment->save();
        return back();
    }
}
