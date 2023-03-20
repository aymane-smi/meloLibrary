<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class editArtistBand extends Component
{
    /**
     * Create a new component instance.
     */
    public $bands;
    public $id;
    public function __construct($bands, $id)
    {
        //
        $this->bands = $bands;

        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.editArtistBand');
    }
}
