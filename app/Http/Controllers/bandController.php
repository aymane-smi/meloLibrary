<?php

namespace App\Http\Controllers;

use App\Models\Members;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class bandController extends Controller
{
    //
    public function addMember(Request $req){
        $req->validate([
            "full_name" => ["filled", "required", Rule::unique("members")->where(function($query){
                $query->where("band_id", request("band_id"));
            })],
        ]);
        Members::create([
            "full_name" => $req->full_name,
            "band_id" => $req->band_id,
        ]);
        return response()->json([
            "message" => "member created",
        ], 200);
    }
}
