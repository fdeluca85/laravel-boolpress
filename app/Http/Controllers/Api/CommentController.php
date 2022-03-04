<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Comment;
use Illuminate\Support\Facades\Validator;
use App\Mail\CommentMail;
use Illuminate\Support\Facades\Mail;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();

        // validazione
        $validator = Validator::make($request->all(), [
            'name' => 'nullable|string|max:50',
            'content' => 'string|required',
            'post_id' => 'exists:posts,id'
        ]);

        if ($validator->fails()) {
            return response()->json([
                "success" => false,
                "errors" => $validator->errors()
            ], 400);
        }

        //creazione commento
        $newComment = new Comment();
        if (!empty($data["name"])) {
            $newComment->name = $data["name"];
        }
        $newComment->content = $data["content"];
        $newComment->post_id = $data["post_id"];
        $newComment->save();

        //invio notifica via mail

        Mail::to("webmaster@boolepress.com")->send(new CommentMail($newComment->post));

        //risposta
        return response()->json([
            "success" => true,
        ]);
    }
}
