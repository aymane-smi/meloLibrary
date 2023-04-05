<?php

namespace App\Http\Controllers;

use App\Models\writers;
use Illuminate\Http\Request;

class writerController extends Controller
{
    //
    public function addWriter(Request $req){
        $req->validate([
            "name" => ["filled", "required"],
        ]);
        writers::create([
            "full_name" => $req->name,
            "music_id" => $req->music_id,
        ]);
        return response()->json([
            "message" => "writer created",
        ], 200);
    }
}
