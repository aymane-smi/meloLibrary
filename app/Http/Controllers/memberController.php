<?php

namespace App\Http\Controllers;

use App\Models\members;
use Illuminate\Http\Request;

class memberController extends Controller
{
    //

    public function deleteMember($id){
        members::find($id)->delete();
        return redirect()->back();
    }

    public function getMember($id){
        return response()->json([
            "Member" => members::find($id),
        ], 200);
    }

    public function updateMember(Request $req){
        $req->validate([
            "name" => "filled|required",
        ]);
        $tmp = members::find($req->id_edit);
        $tmp->full_name = $req->name;
        $tmp->save();
        return response()->json([
            "message" => "member updated",
        ], 200);
    }
}
