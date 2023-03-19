<?php

namespace App\Http\Livewire;

use App\Models\artist;
use App\Models\band;
use Livewire\Component;

class EditArtist extends Component
{
    public $artist;

    public function change($id)
    {
        $this->artist = artist::find($id);
    }
    public function render()
    {

        return view('livewire.edit-artist');
    }
}
