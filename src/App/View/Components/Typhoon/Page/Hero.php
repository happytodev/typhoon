<?php

namespace App\View\Components\Typhoon\Page;

use Illuminate\View\Component;

class Hero extends Component
{

    /**
     * Content for the header
     */
    public $heroTitle;

    public $heroTitleTextSize;

    /**
     * Type of header : h1, h2, h3, etc.
     */
    public $heroSubtitle;

    public $heroSubtitleTextSize;

    /**
     * Description text for the hero block. Not mandatory.
     *
     * @var string
     */
    public $heroDescription;

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
    
    public $heroHeight;
    
    public $heroArtIcon;
    
    public $heroArtIconOffsetX;
    
    // public $heroArtIconOffsetY;
    
    public $heroArtIconHeight;

    // public $heroArtIconWidth;

    public $heroArtIconVisible;

    public $heroArtIconInvertColor;
    
    public $heroArtIconOpacity;

    public $heroArtIconRotate;

    public $heroArtIconRotateInverse;

    public $heroArtIconRotateAngle;

    public $heroCtaVisible;

    public $heroCtaButtonGlowing;

    public $heroCtaButtonText;

    public $heroCtaButtonBackgroundColor;

    public $heroCtaButtonTextColor;

    public $heroCtaButtonPosition;

    public $heroCtaUrl;

    public $heroCtaUrlTarget;

    public $heroBackgroundTextPosition;

    public $heroBackgroundBackdropBrightness;

    public $heroBackgroundBackdropOpacity;

    public $heroBackgroundBackdropInvert;

    public $heroBackgroundBackdropColor;

    public $heroImageBackgroundSize;

    public $heroImageBackgroundPosition;

    public $fullwidth;

    public $heroTitleTextPosition;

    public $heroSubtitleTextPosition;

    public $heroDescriptionTextPosition;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        $heroTitle,
        $heroTitleTextSize,
        $heroSubtitle,
        $heroSubtitleTextSize,
        $heroDescription,
        $heroImage,
        $heroImagePosition,
        $titleTextColor,
        $subtitleTextColor,
        $descriptionTextColor,
        $backgroundColor,
        $heroHeight,
        $heroArtIcon,
        $heroArtIconOffsetX,
        // $heroArtIconOffsetY,
        $heroArtIconHeight,
        // $heroArtIconWidth,
        $heroArtIconVisible,
        $heroArtIconInvertColor,
        $heroArtIconOpacity,
        $heroArtIconRotate,
        $heroArtIconRotateInverse,
        $heroArtIconRotateAngle,
        $heroCtaVisible,
        $heroCtaButtonGlowing,
        $heroCtaButtonText,
        $heroCtaButtonBackgroundColor,
        $heroCtaButtonTextColor,
        $heroCtaButtonPosition,
        $heroCtaUrl,
        $heroCtaUrlTarget,
        $heroBackgroundTextPosition,
        $heroBackgroundBackdropBrightness,
        $heroBackgroundBackdropOpacity,
        $heroBackgroundBackdropInvert,
        $heroBackgroundBackdropColor,
        $heroImageBackgroundSize,
        $heroImageBackgroundPosition,
        $fullwidth,
        $heroTitleTextPosition,
        $heroSubtitleTextPosition,
        $heroDescriptionTextPosition
    ) {
        //
        $this->heroTitle = $heroTitle;

        $this->heroTitleTextSize = $heroTitleTextSize;

        $this->heroSubtitle = $heroSubtitle;
        
        $this->heroSubtitleTextSize = $heroSubtitleTextSize;

        $this->heroDescription = $heroDescription;

        $this->heroImage = $heroImage;

        $this->heroImagePosition = $heroImagePosition;

        $this->titleTextColor = $titleTextColor;

        $this->subtitleTextColor = $subtitleTextColor;

        $this->descriptionTextColor = $descriptionTextColor;

        $this->backgroundColor = $backgroundColor;

        $this->heroHeight = $heroHeight;

        $this->heroArtIcon = $heroArtIcon;

        $this->heroArtIconHeight = $heroArtIconHeight;

        // $this->heroArtIconWidth = $heroArtIconWidth;

        $this->heroArtIconVisible = $heroArtIconVisible;

        $this->heroArtIconOffsetX = $heroArtIconOffsetX;

        // $this->heroArtIconOffsetY = $heroArtIconOffsetY;

        $this->heroArtIconInvertColor = $heroArtIconInvertColor;

        $this->heroArtIconOpacity = $heroArtIconOpacity;

        $this->heroArtIconRotate = $heroArtIconRotate;

        $this->heroArtIconRotateInverse = $heroArtIconRotateInverse;

        $this->heroArtIconRotateAngle = $heroArtIconRotateAngle;

        $this->heroCtaVisible = $heroCtaVisible;

        $this->heroCtaButtonGlowing = $heroCtaButtonGlowing;

        $this->heroCtaButtonText = $heroCtaButtonText;

        $this->heroCtaButtonBackgroundColor = $heroCtaButtonBackgroundColor;

        $this->heroCtaButtonTextColor = $heroCtaButtonTextColor;
        
        $this->heroCtaButtonPosition = $heroCtaButtonPosition;

        $this->heroCtaUrl = $heroCtaUrl;

        $this->heroCtaUrlTarget = $heroCtaUrlTarget;

        $this->heroBackgroundTextPosition = $heroBackgroundTextPosition;

        $this->heroBackgroundBackdropBrightness = $heroBackgroundBackdropBrightness;

        $this->heroBackgroundBackdropOpacity = $heroBackgroundBackdropOpacity;

        $this->heroBackgroundBackdropInvert = $heroBackgroundBackdropInvert;

        $this->heroBackgroundBackdropColor = $heroBackgroundBackdropColor;

        $this->heroImageBackgroundSize = $heroImageBackgroundSize;

        $this->heroImageBackgroundPosition = $heroImageBackgroundPosition;

        $this->fullwidth = $fullwidth;
        
        $this->heroTitleTextPosition = $heroTitleTextPosition;
        
        $this->heroSubtitleTextPosition = $heroSubtitleTextPosition;
        
        $this->heroDescriptionTextPosition = $heroDescriptionTextPosition;
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
