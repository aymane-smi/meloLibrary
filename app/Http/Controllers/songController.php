<?php

namespace App\Http\Controllers;

use App\Models\artist;
use App\Models\band;
use App\Models\BandMusic;
use App\Models\category;
use App\Models\favorite;
use App\Models\music;
use App\Models\music_category;
use App\Models\MusicArtist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\File;

class songController extends Controller
{
    //
    public function showSongs(){
        $result = [
            "songs" => music::all(),
            "songs_nbr" => music::count(),
            "artists" => artist::all(),
            "bands" => band::all(),
            "categories" => category::all(),
        ];
        return view("admin.showSongs", $result);
    }

    public function addSong(Request $req){
        $req->validate([
            "title" => "filled|required",
            "song_image" => "image|required",
            "song" => ["required", File::types(['mp3', 'wav'])],
            "duration" => "required|filled",
            "bands" => "array|min:1",
            "artists" => "array|min:1",
        ]);
        $song_name = now()->timestamp . "_" . $req->song->getClientOriginalName();
        $req->song->storeAs('public/songs/audios', $song_name);
        $song_image = now()->timestamp . "_" . $req->song_image->getClientOriginalName();
        $req->song_image->storeAs('public/songs/images', $song_image);
        $tmp = music::create([
            "title" => $req->title,
            "image" => $song_image,
            "song" => $song_name,
            "duration" => $req->duration,
        ]);
        if($req->artists)
        foreach($req->artists as $id)
            MusicArtist::create([
                "music_id" => $tmp->id,
                "artist_id" => $id
            ]);
        if($req->bands)
        foreach($req->bands as $id)
            BandMusic::create([
                "music_id" => $tmp->id,
                "band_id" => $id
            ]);
        if($req->categories)
        foreach($req->categories as $id)
                music_category::create([
                    "music_id" => $tmp->id,
                    "category_id" => $id
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
        $tmp = music::find($id);
        $result = [
            "song" => $tmp,
            "writers" => $tmp->writers,
            "artists" => $tmp->artists,
            "bands" => $tmp->bands,
            "favorite" => favorite::where('music_id', $id)->where("client_id", auth()->user()->id)->first(),
            "comments" => DB::table('comment')
            ->join('users', 'comment.client_id', '=', 'users.id')
            ->where('comment.music_id', $id)
            ->select('users.username', 'comment.*')
            ->get(),
        ];
        return view("admin.showSong", $result);
    }

    public function downloadSong($file  ){
        $pathToFile = storage_path('app/public/songs/audios/' . $file);
        return response()->download($pathToFile);
    }

    public function songUp($id){
        $tmp = music::find($id);
        $tmp->selected++;
        $tmp->save();
        return redirect("/Dashboard/song/".$id);
    }
}
