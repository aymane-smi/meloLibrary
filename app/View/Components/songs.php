<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class songs extends Component
{
    /**
     * Create a new component instance.
     */
    public $songs_nbr;
    public $songs;
    public function __construct($songs_nbr, $songs)
    {
        //
        $this->songs = $songs;
        $this->songs_nbr = $$songs_nbr;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.songs');
    }
}
