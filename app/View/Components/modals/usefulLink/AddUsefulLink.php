<?php

namespace App\View\Components\modals\usefulLink;

use Illuminate\View\Component;

class AddUsefulLink extends Component
{
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.modals.useful-link.add-useful-link');
    }
}
