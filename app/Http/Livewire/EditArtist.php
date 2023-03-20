<?php

namespace App\Http\Livewire;

use App\Models\artist;
use App\Models\band;
use Livewire\Component;
use Illuminate\Http\Request;

class EditArtist extends Component
{
    public $artist;
    public $bands;

    public function change($id)
    {
        $this->artist = artist::find($id);
    }

    public function editArtist(Request $req){
        $req->validate([
            "name" => "filled|required",
            "country" => "filled|required",
            "birthday" => "date_format:Y-m-d|required",
            "artist_image" => "image",
        ]);
        $this->artist->name = $req->name;
        $this->artist->country = $req->country;
        $this->artist->birthday = $req->birthday;
        $this->artist->band_id = $req->band;
        if($req->artist_image){
            $name = now()->timestamp . "_" . $req->artist_image->getClientOriginalName();
            $req->artist_image->storeAs('public/artists', $name);
            $this->artist->artist_image = $req->artist_image;
        }
        $this->artist->save();
    }
    public function render()
    {
        $bands = band::all();
        return view('livewire.edit-artist');
    }
}
