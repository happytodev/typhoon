<?php

namespace App\View\Components\Typhoon\Page;

use Illuminate\View\Component;

class Hero extends Component
{

    /**
     * Content for the header
     */
    public $heroTitle;

    /**
     * Type of header : h1, h2, h3, etc.
     */
    public $heroSubtitle;

    /**
     * Description text for the hero block. Not mandatory.
     *
     * @var string
     */
    public $heroText;

    /**
     * Illustrzation image of hero block
     */
    public $heroImage;

    /**
     * Position of the illustration image - not implemented yet
     *
     * @var string
     */

    public $heroImagePosition;

    /**
     * Position of the illustration image - not implemented yet
     *
     * @var string
     */

    public $titleTextColor;

    /**
     * Position of the illustration image - not implemented yet
     *
     * @var string
     */

    public $subtitleTextColor;

    /**
     * Position of the illustration image - not implemented yet
     *
     * @var string
     */

    public $descriptionTextColor;

    /**
     * Position of the illustration image - not implemented yet
     *
     * @var string
     */

    public $backgroundColor;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        $heroTitle,
        $heroSubtitle,
        $heroText,
        $heroImage,
        $heroImagePosition,
        $titleTextColor,
        $subtitleTextColor,
        $descriptionTextColor,
        $backgroundColor
    )
    {
        //
        $this->heroTitle = $heroTitle;

        $this->heroSubtitle = $heroSubtitle;
        
        $this->heroText = $heroText;

        $this->heroImage = $heroImage;

        $this->heroImagePosition = $heroImagePosition;

        $this->titleTextColor = $titleTextColor;

        $this->subtitleTextColor = $subtitleTextColor;

        $this->descriptionTextColor = $descriptionTextColor;

        $this->backgroundColor = $backgroundColor;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.typhoon.page.hero');
    }
}
