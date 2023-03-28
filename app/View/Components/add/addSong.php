<?php

namespace App\View\Components\add;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class addSong extends Component
{
    /**
     * Create a new component instance.
     */
    public $artists;
    public $bands;
    public function __construct($artists, $bands)
    {
        //
        $this->artists = $artists;
        $this->bands = $bands;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.add.addSong');
    }
}
