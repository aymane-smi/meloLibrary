<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class band extends Component
{
    /**
     * Create a new component instance.
     */
    public $band;
    public function __construct($band)
    {
        //
        $this->band = $band;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.band');
    }
}
