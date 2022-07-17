<?php

namespace App\View\Components\Typhoon\Page;

use Illuminate\View\Component;

class Image extends Component
{

    public $imageUrl;

    public $imageAlt;

    public $imageWidth;

    public $imageBackgroundColor;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($imageUrl, $imageAlt, $imageWidth, $imageBackgroundColor)
    {
        //
        $this->imageUrl = $imageUrl;

        $this->imageAlt = $imageAlt;

        $this->imageWidth = $imageWidth;

        $this->imageBackgroundColor = $imageBackgroundColor;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.typhoon.page.image');
    }
}
