<?php

namespace App\View\Components\Typhoon\Layout;

use Illuminate\View\Component;
use RyanChandler\FilamentNavigation\Facades\FilamentNavigation;

class Menu extends Component
{
    public $menu;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        // 
        $this->menu = FilamentNavigation::get('main-menu');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.typhoon.layout.menu');
    }
}
