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
    public $categories;
    public function __construct($artists, $bands, $categories)
    {
        //
        $this->artists = $artists;
        $this->bands = $bands;
        $this->categories = $categories;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.add.addSong');
    }
}
