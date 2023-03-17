<?php

namespace App\Http\Livewire;

use App\Models\artist;
use App\Models\band;
use Livewire\Component;

class EditArtist extends Component
{
    public $artist_id;

    public function changeId($id)
    {
        $this->artist_id = $id;
    }
    public function render()
    {

        return view('livewire.edit-artist', [
            "id" => $this->artist_id,
            "artist" => artist::find($this->artist_id),
            "bands" => band::all(),
        ]);
    }
}
