<?php

declare(strict_types=1);

namespace App\Actions\HelpCategories;

use App\Contracts\ActionsResponseModelInterface;
use App\Models\HelpCategory;

final class AddHelpCategoryResponse implements ActionsResponseModelInterface
{
    private HelpCategory $helpCategory;

    public function __construct(HelpCategory $helpCategory)
    {
        $this->helpCategory = $helpCategory;
    }

    public function getResponse(): HelpCategory
    {
        return $this->helpCategory;
    }
}
