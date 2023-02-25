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
                ->join("music_rate", 'music.id', '=', 'artist_music.music_id')
                ->groupBy("music_rate.rate")
                ->limit(4)
                ->get(),
        ];
        return view("admin.index", $result);
    }


    //handle songs logic

    public function showSong($id)
    {
        $song = music::find($id);
        $result = [
            "song" => $song,
            "comments" => $song->comments(),
            "artists" => $song->artists(),
            "categories" => $song->categories(),
            "writers" => $song->writers(),
            "rating" => music::select("SUM(rating) as total, AVG(rating) as rating")->where('music_id', '=', $song->id)->get(),
        ];
        return view("admin.song", $result);
    }

    public function showSongs()
    {
        $songs = music::all()->paginate(10);
        return view("admin.songs", $songs);
    }

    //handle categories logic

    public function showCategory($id)
    {
        $category = category::find($id);
        return view("admin.category", $category);
    }

    public function showCategories()
    {
        $categories = category::all()->paginate(10);
        return view("admin.categories", $categories);
    }

    //handle artist logic

    public function showArtist($id)
    {
        $artist = artist::class($id);
        $result = [
            "artist" => $artist,
            "bands" => $artist->bands(),
            "songs" => $artist->songs()->paginate(10),
        ];
        return view("admin.artits", $result);
    }

    public function showArtists()
    {
    }

    //handle band logic

    public function showBand()
    {
    }

    public function showBands()
    {
    }
}
