<?php

declare(strict_types=1);

namespace App\Actions\HelpCategories;

use App\Contracts\ActionsResponseModelInterface;
use App\Models\HelpCategory;

final class UpdateHelpCategoryResponse implements ActionsResponseModelInterface
{
    private HelpCategory $updatedHelpCategory;

    public function __construct(HelpCategory $updatedHelpCategory)
    {
        $this->updatedHelpCategory = $updatedHelpCategory;
    }

    public function getResponse(): HelpCategory
    {
        return $this->updatedHelpCategory;
    }
}
