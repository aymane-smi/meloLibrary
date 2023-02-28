<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class categories extends Component
{
    /**
     * Create a new component instance.
     */
    public $categories_nbr;
    public $categories;
    public function __construct($categories_nbr, $categories)
    {
        //
        $this->categories = $categories;
        $this->categories_nbr = $categories_nbr;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.categories');
    }
}
