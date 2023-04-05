<?php

namespace App\Http\Controllers;

use App\Models\favorite;
use App\Models\music;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class favoriteController extends Controller
{
    //

    public function showFavorites(){
        $result = [
            "username" => auth()->user()->username,
            "songs" => DB::table('favorite')
            ->where('client_id', auth()->user()->id)
            ->join('music', 'favorite.music_id', '=', 'music.id')
            ->select('music.*')
            ->get()
        ];
        return view("admin.showFavorites", $result);
    }

    public function addFavorite(Request $req){
        favorite::create([
            "music_id" => $req->music_id,
            "client_id" => $req->user_id,
        ]);

        return response()->json([
            "message" => "added to favorite!",
        ], 200);
    }

    public function deleteFavorite(Request $req){
        $tmp = favorite::where("music_id", $req->music_id)->where("client_id", $req->user_id);
        $tmp->delete();
        return response()->json([
            "message" => "deleted",
        ], 200);
    }
}
