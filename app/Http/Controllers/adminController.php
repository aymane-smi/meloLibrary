<?php

namespace App\Http\Controllers;

use App\Models\artist;
use App\Models\band;
use App\Models\category;
use App\Models\music;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;

class adminController extends Controller
{
    //dashboard

    public function index()
    {
        $result = [
            "created_songs" => music::count(),
            "created_artists" => artist::count(),
            "created_band" => band::count(),
            "created_categories" => category::count(),
            "top_songs" => music::select('music.*')->join('client_rate', 'music.id', '=', 'client_rate.music_id')
                ->orderBy("client_rate.rating", "desc")
                ->limit(4)
                ->get(),
            "top_categories" => category::all()->sortByDesc("selected"),
            "top_artists" => artist::select("artist.*")->join('artist_music', 'artist.id', '=', 'artist_music.artist_id')
                ->join("client_rate", 'client_rate.music_id', '=', 'artist_music.music_id')
                ->orderBy("client_rate.rating", "desc")
                ->limit(4)
                ->get(),
        ];
        //dd($result);
        return view("admin.index", ["results" => $result]);
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

    public function createSong(Request $req)
    {
        try {
            $req->validate([
                "title" => "filled|required",
                "duration" => "required|date_format:H:i",
                "image" => "required|image",
                "artist" => "array:required_without:band",
                "band" => "array:required_without:artist",
                "writers" => "array:required",
                "song" => ["required", File::types(['mp3', 'wav'])],
            ]);

            $name = now()->timestamp . "_" . $req->input("image")->getClientOriginalName();
            $req->file("image")->storeAs('image', $name, "public");
            $new_song = music::create([
                "title" => $req->input("title"),
                "duration" => $req->input("duration"),
                "image" => $name,
            ]);
            // if($req->input("artist"))
        } catch (Exception $err) {
            echo $err;
        }
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
        return view("admin.artist", $result);
    }

    public function showArtists()
    {
        $artists = artist::paginate(10);
        return view("admin.showArtists", ["artists" => $artists, "artits_nbr" => artist::all()->count(), "bands" => band::all()]);
    }

    public function addArtist(Request $req){
        $req->validate([
            "name" => "filled|required",
            "country" => "filled|required",
            "birthday" => "date_format:d-m-Y|required",
            "artist_image" => "image|required",
            "band" => "integer",
        ]);
        $name = now()->timestamp . "_" . $req->input("artist_image")->getClientOriginalName();
        $req->file("artist_image")->storeAs('image', $name, "public");
        artist::create([
            "name" => $req->name,
            "country" => $req->country,
            "birthday" => $req->birthday,
            "artist_image" => $name,
        ]);
        return redirect("/Dashboard/artists");
    }

    //handle band logic

    public function showBand($id)
    {
        $band = band::find($id);
        $result = [
            "band" => $band,
            "members" => $band->members(),
            "artists" => $band->artists(),
            "songs" => $band->songs(),
        ];

        return view("admin.band", $result);
    }

    public function showBands()
    {
        $band = band::all()->paginate(10);
        return view("admins.bands", $band);
    }
}
