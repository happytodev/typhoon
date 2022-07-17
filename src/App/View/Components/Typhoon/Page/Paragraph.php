<?php

namespace App\View\Components\Typhoon\Page;

use Illuminate\View\Component;

class Paragraph extends Component
{

    /**
     * Paragraph content
     *
     * @var string in markdown format
     */
    public $paragraphContent;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $paragraphContent)
    {
        //
        $this->paragraphContent = $paragraphContent;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.typhoon.page.paragraph');
    }
}
