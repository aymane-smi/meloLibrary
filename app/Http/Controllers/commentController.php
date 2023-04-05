<?php

namespace App\Http\Controllers;

use App\Models\comment;
use App\Models\user;
use Illuminate\Http\Request;

class commentController extends Controller
{
    //

    public function addComment(Request $req){
        $req->validate([
            "comment" => "filled|required",
        ]);
        comment::create([
            "comment" => $req->comment,
            "client_id" => $req->user_id,
            "music_id" => $req->song_id,
        ]);

        return response()->json([
            "comment" => $req->comment,
            "username" => user::find($req->user_id)->username,
        ], 200);
    }

    public function deleteComment($id){
        comment::find($id)->delete();
        return back();
    }
}
