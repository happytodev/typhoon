<?php

namespace App\View\Components\Typhoon\Page;

use Illuminate\View\Component;

class Header extends Component
{
    /**
     * Content for the header
     */
    public $content;

    /**
     * Type of header : h1, h2, h3, etc.
     */
    public $level;

    /**
     * Width of the header
     */
    public $width;

    /**
     * Title text color
     *
     * @var string
     */
    public $titleColor;

    /**
     * Create a new component instance.
     *
     * @param string $content
     * @param string $type
     * 
     * @return void
     */
    public function __construct(string $content, string $level, string $width, string|null $titleColor = "")
    {
        //
        $this->content = $content;

        $this->titleColor = $titleColor;

        switch ($level) {
            case 'h1':
                $this->level = 'text-6xl';
                break;
            case 'h2':
                $this->level = 'text-5xl';
                break;
            case 'h3':
                $this->level = 'text-4xl';
                break;
            case 'h4':
                $this->level = 'text-3xl';
                break;
            case 'h5':
                $this->level = 'text-2xl';
                break;
            case 'h6':
                $this->level = 'text-xl';
                break;
            default:
                $this->level = 'text-4xl';
                break;
        }

        switch ($width) {
            case '12':
                $this->width = 'col-span-12';
                break;
            case '9':
                $this->width = 'col-span-9';
                break;
            case '6':
                $this->width = 'col-span-12 md:col-span-6';
                break;
            case '3':
                $this->width = 'col-span-12 md:col-span-3';
                break;
            default:
                $this->width = 'col-span-12';
                break;
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.typhoon.page.header');
    }
}
