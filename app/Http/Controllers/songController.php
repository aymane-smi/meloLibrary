<?php

namespace App\Http\Controllers;

use App\Models\music;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\File;

class songController extends Controller
{
    //
    public function showSongs(){
        return view("admin.showSongs", ["songs" => music::all(), "songs_nbr" => music::count()]);
    }

    public function addSong(Request $req){
        $req->validate([
            "title" => "filled|required",
            "song_image" => "image|required",
            "song" => ["required", File::types(['mp3', 'wav'])],
            "duration" => "required|filled",
        ]);
        $song_name = now()->timestamp . "_" . $req->song->getClientOriginalName();
        $req->song->storeAs('public/songs/audios', $song_name);
        $song_image = now()->timestamp . "_" . $req->song_image->getClientOriginalName();
        $req->song_image->storeAs('public/songs/images', $song_image);
        music::create([
            "title" => $req->title,
            "image" => $song_image,
            "song" => $song_name,
            "duration" => $req->duration,
        ]);
        return response()->json([
            "message" => "song created",
        ], 200); 
    }

    public function deleteSong($id){
        $tmp = music::find($id);
        Storage::delete("songs/audios".$tmp->image);
        Storage::delete("songs/images".$tmp->song);
        $tmp->delete();
        return redirect("/Dashboard/songs");
    }

    public function showSong($id){
        $result = [
            "song" => music::find($id),
            "artists" => music::find($id)->artists(),
            "bands" => music::find($id)->bands(),
        ];
        return view("admin.showSong", ["song" => music::find($id)]);
    }
}
