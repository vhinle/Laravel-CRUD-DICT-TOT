<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Widget extends Component
{

    public $color;
    public $icon;
    /**
     * Create a new component instance.
     */
    public function __construct($icon, $color)
    {
        $this->color = $color;
        $this->icon = $icon;

        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.widget');
    }
}
