<?php

namespace App\View\Components\modals\admin\help;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class CreatePost extends Component
{
    public Collection $categories;

    public function __construct(Collection $categories)
    {
        $this->categories = $categories;
    }

    public function render()
    {
        return view('components.modals.admin.help.create-post');
    }
}
