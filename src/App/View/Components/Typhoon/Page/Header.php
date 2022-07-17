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
    public $type;

    /**
     * Width of the header
     */
    public $width;

    /**
     * Create a new component instance.
     *
     * @param string $content
     * @param string $type
     * 
     * @return void
     */
    public function __construct(string $content, string $type, string $width)
    {
        //
        $this->content = $content;

        switch ($type) {
            case 'h1':
                $this->type = 'text-6xl';
                break;
            case 'h2':
                $this->type = 'text-5xl';
                break;
            case 'h3':
                $this->type = 'text-4xl';
                break;
            case 'h4':
                $this->type = 'text-3xl';
                break;
            case 'h5':
                $this->type = 'text-2xl';
                break;
            case 'h6':
                $this->type = 'text-xl';
                break;
            default:
                $this->type = 'text-4xl';
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
