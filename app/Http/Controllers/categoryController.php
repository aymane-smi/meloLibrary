<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    //
    public function showCategory($id){
        $tmp = category::find($id);
        $result = [
            "category" => $tmp,
            "songs" => $tmp->songs(),
        ];

        return view("admin.showCategory", $result);
    }
}
