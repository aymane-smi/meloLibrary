<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class editArtistPersonalInfoInput extends Component
{
    /**
     * Create a new component instance.
     */
    public $artist;
    public function __construct($artist)
    {
        //
        $this->artist = $artist;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.edit-artist-personal-info-input');
    }
}
