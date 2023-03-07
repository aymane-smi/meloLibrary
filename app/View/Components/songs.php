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
    public $songsNbr;
    public $songs;
    public function __construct($songsNbr, $songs)
    {
        //
        $this->songs = $songs;
        $this->songsNbr = $songsNbr;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.songs');
    }
}
