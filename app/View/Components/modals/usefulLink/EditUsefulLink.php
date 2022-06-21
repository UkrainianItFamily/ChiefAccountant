<?php

namespace App\View\Components\modals\usefulLink;

use Illuminate\View\Component;

class EditUsefulLink extends Component
{
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.modals.admin.useful-link.edit-useful-link');
    }
}
