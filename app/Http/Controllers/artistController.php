<?php

namespace App\Http\Controllers;

use App\Models\artist;
use Illuminate\Http\Request;

class artistController extends Controller
{
    //
    public function showArtist($id){
        $result = [
            "artist" => artist::find($id),
            "songs" => artist::find($id)->songs,
        ];

        return view("admin.showArtist", $result);
    }

    public function artistUp($id){
        $tmp = artist::find($id);
        $tmp->selected++;
        $tmp->save();
        return redirect("/Dashboard/artist/".$id);
    }
}