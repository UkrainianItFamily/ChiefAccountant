<?php

declare(strict_types=1);

namespace App\Actions\HelpCategories;

use App\Repositories\HelpCategory\HelpCategoryRepositoryInterface;

final class GetAllHelpCategoriesAction
{
    private HelpCategoryRepositoryInterface $helpCategoryRepository;

    public function __construct(HelpCategoryRepositoryInterface $helpCategoryRepository)
    {
        $this->helpCategoryRepository = $helpCategoryRepository;
    }

    public function execute(): GetAllHelpCategoriesResponse
    {
        $categories = $this->helpCategoryRepository->getAllHelpCategories();

        return new GetAllHelpCategoriesResponse($categories);
    }
}
