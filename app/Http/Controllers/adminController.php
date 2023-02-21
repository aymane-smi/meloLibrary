<?php

namespace App\Http\Controllers;

use App\Models\artist;
use App\Models\band;
use App\Models\category;
use App\Models\music;
use Illuminate\Http\Request;

class adminController extends Controller
{
    //

    public function index()
    {
        $result = [
            "created_songs" => music::count()->get(),
            "created_artists" => artist::count()->get(),
            "created_band" => band::count()->get(),
            "top_songs" => music::select('music.*')->join('music_rate', 'music.id', '=', 'music_rate.music_id')
                ->groupBy("music.*")
                ->orderBy("rate")
                ->limit(4)
                ->get(),
            "top_categories" => category::all()->orderBy("selected"),
            "top_artists" => artist::select("artist.*")->join('artist_music', 'artist.id', '=', 'artist_music.artist_id')
                ->join("artist", 'artist.id', '=', ''),
        ];
        return view("admin.index");
    }
}
