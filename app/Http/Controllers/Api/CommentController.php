<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();

        //creazione commento
        $newComment = new Comment();
        if (!empty($data["name"])) {
            $newComment->name = $data["name"];
        }
        $newComment->content = $data["content"];
        $newComment->post_id = $data["post_id"];
        $newComment->save();


        //risposta
        return response()->json([
            "success" => true,
        ]);
    }
}
