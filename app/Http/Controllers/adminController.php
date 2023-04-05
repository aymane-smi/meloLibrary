<?php

namespace App\Http\Controllers;

use App\Models\artist;
use App\Models\band;
use App\Models\category;
use App\Models\music;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\File;
use App\Http\Requests\MultipartFormRequest;
use Illuminate\Validation\Rule;

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
            "top_songs" => music::orderBy("selected")->take(4)->get(),
            "top_categories" => category::orderBy("selected")->take(4)->get(),
            "top_artists" => artist::orderBy("selected")->take(4)->get(),
        ];
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
        return response()->json([
            "Category" => category::find($id),
        ], 200);
    }

    public function addCatgeory(Request $req){
        $req->validate([
            "name" => "filled|required",
        ]);
        category::create([
            "name" => $req->name,
            "selected" => 0,
        ]);
        return response()->json([
            "message" => "category created",
        ], 200);
    }

    public function deleteCategory($id){
        category::find($id)->delete();
        return redirect("/Dashboard/categories");
    }

    public function showCategories()
    {
        $categories = category::all();
        return view("admin.showCategories", ["categories" => $categories, "categories_nbr" => category::count()]);
    }

    public function updateCategory(Request $req){
        $req->validate([
            "name" => "filled|required",
        ]);
        $tmp = category::find($req->id_edit);
        $tmp->name = $req->name;
        $tmp->save();
        return response()->json([
            "message" => "category updated",
        ], 200);
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
            "birthday" => "date_format:Y-m-d|required",
            "artist_image" => "image|required",
            "band" => "integer",
        ]);
        $name = now()->timestamp . "_" . $req->artist_image->getClientOriginalName();
        $req->artist_image->storeAs('public/artists', $name);
        $created_artist = artist::create([
            "name" => $req->name,
            "country" => $req->country,
            "birthday" => $req->birthday,
            "image" => $name,
        ]);
        $created_artist->bands()->attach($req->band);
        return response()->json([
            "message" => "artist created",
        ], 200);
    }

    public function getArtist($id){
        return response()->json(["artist" => artist::find($id), "bands" => band::all()], 200);
    }

    public function deleteArtist($id){
        $tmp = artist::find($id);
        Storage::delete("artists/".$tmp->image_artist);
        $tmp->delete();
        return redirect("/Dashboard/artists");
    }

    public function updateArtist(Request $req){
        $req->validate([
            "name" => "filled|required",
            "country" => "filled|required",
            "birthday" => "date_format:Y-m-d|required",
            "artist_image" => "image",
            "band" => "integer",
        ]);
        $tmp = artist::find($req->id_edit);
        if($req->file("artist_image")){
            $name = now()->timestamp . "_" . $req->artist_image->getClientOriginalName();
            $req->artist_image->storeAs('public/artists', $name);
            Storage::delete("public/artists/".$tmp->image);
            $tmp->image = $name;
        }
        $tmp->name = $req->name;
        $tmp->country = $req->country;
        $tmp->birthday = $req->birthday;
        $tmp->save();
        return response()->json([
            "message" => "artist updated",
        ], 200);
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
        $band = band::all();
        return view("admin.showBands", ["bands" => $band, "bands_nbr" => band::count()]);
    }

    public function addBand(Request $req){
        $req->validate([
            "name" => ["filled", "required", Rule::unique("band", "name")],
            "country" => "filled|required",
            "creationDate" => "filled|required|date_format:Y-m-d",
            "band_image" => "image|required",
        ]);
        $name = now()->timestamp . "_" . $req->band_image->getClientOriginalName();
        $req->band_image->storeAs('public/bands', $name);
        band::create([
            "name" => $req->name,
            "country" => $req->country,
            "creation_date" => $req->creationDate,
            "image" => $name,
        ]);
        return response()->json(["message" => "band created"], 200);
    }

    public function getBand($id){
        return response()->json(["band" => band::find($id)], 200);
    }

    public function updateBand(Request $req){
        $req->validate([
            "name" => ["filled","required", Rule::unique("band", "name")],
            "country" => "filled|required",
            "creationDate" => "date_format:Y-m-d|required",
            "artist_image" => "image",
        ]);
        $tmp = band::find($req->id_edit);
        if($req->file("band_image")){
            $name = now()->timestamp . "_" . $req->band_image->getClientOriginalName();
            $req->artist_image->storeAs('public/bands', $name);
            Storage::delete("public/bands/".$tmp->image);
            $tmp->image = $name;
        }
        $tmp->name = $req->name;
        $tmp->country = $req->country;
        $tmp->creation_date = $req->creationDate;
        $tmp->save();
        return response()->json([
            "message" => "artist updated",
        ], 200);
    }
    public function deleteBand($id){
        $tmp = band::find($id);
        Storage::delete("bands/".$tmp->image);
        $tmp->delete();
        return redirect("/Dashboard/bands");
    }
}
