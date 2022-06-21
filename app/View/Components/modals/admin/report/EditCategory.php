<?php

namespace App\View\Components\modals\admin\report;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class EditCategory extends Component
{
    public Collection $categories;

    public function __construct(Collection $categories)
    {
        $this->categories = $categories;
    }

    public function render()
    {
        return view('components.modals.admin.report.edit-category');
    }
}
