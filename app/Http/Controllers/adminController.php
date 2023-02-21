<?php

namespace App\Http\Controllers;

use App\Models\artist;
use App\Models\band;
use App\Models\music;
use Illuminate\Http\Request;

class adminController extends Controller
{
    //

    public function index()
    {
        $result = [
            "created_songs" => music::count(),
            "created_artists" => artist::count(),
            "created_band" => band::count(),
            "top_songs" => music
        ];
        return view("admin.index");
    }
}
