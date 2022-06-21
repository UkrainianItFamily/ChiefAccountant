<?php

declare(strict_types=1);

namespace App\Actions\HelpCategories;

use App\Repositories\HelpCategory\HelpCategoryRepositoryInterface;

final class UpdateHelpCategoryAction
{
    private HelpCategoryRepositoryInterface $helpCategoryRepository;

    public function __construct(HelpCategoryRepositoryInterface $helpCategoryRepository)
    {
        $this->helpCategoryRepository = $helpCategoryRepository;
    }

    public function execute(UpdateHelpCategoryRequest $request): UpdateHelpCategoryResponse
    {
        $updateCategory = $this->helpCategoryRepository->getHelpCategoryById($request->getId());

        $updateCategory->title = $request->getTitle();
        $updateCategory->slug = $request->getSlug();

        $this->helpCategoryRepository->updateHelpCategory($updateCategory);

        return new UpdateHelpCategoryResponse($updateCategory);
    }
}
