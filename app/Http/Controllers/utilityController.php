<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class utilityController extends Controller
{
    //
    public function randomColor(){
        return response()->json(["code" => '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT)], 200);
    }
}
