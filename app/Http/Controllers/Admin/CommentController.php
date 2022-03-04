<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    public function update(Request $request, Comment $comment)
    {
        //aggiornamento
        $comment->approved = true;
        $comment->save();

        //redirect al post
        return redirect()->route("posts.show", $comment->post_id);
    }
}
