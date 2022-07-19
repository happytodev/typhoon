<?php

namespace App\View\Components\Typhoon\Layout;

use Illuminate\View\Component;
use RyanChandler\FilamentNavigation\Models\Navigation;
use RyanChandler\FilamentNavigation\Facades\FilamentNavigation;

class Menu extends Component
{
    public $menu;

    /**
     * Name of the menu to search. If not provided, component will get the
     * first menu available in database
     *
     * @var string
     */
    public $menuName;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($menuName = null)
    {
        // if $menuName provided
        if ($menuName) {
            $this->menu = FilamentNavigation::get($menuName);
        } else {
            $this->menu = Navigation::first();
        }
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
