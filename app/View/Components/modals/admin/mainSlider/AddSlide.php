<?php

namespace App\View\Components\modals\admin\mainSlider;

use Illuminate\View\Component;

class AddSlide extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.modals.admin.main-slider.add-slide');
    }
}
