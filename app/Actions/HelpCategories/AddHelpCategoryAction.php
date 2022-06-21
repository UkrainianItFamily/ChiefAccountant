<?php

declare(strict_types=1);

namespace App\Actions\HelpCategories;

use App\Models\HelpCategory;
use App\Repositories\HelpCategory\HelpCategoryRepositoryInterface;
use Illuminate\Support\Str;

final class AddHelpCategoryAction
{
    private HelpCategoryRepositoryInterface $helpCategoryRepository;

    public function __construct(HelpCategoryRepositoryInterface $helpCategoryRepository)
    {
        $this->helpCategoryRepository = $helpCategoryRepository;
    }

    public function execute(AddHelpCategoryRequest $request): AddHelpCategoryResponse
    {
        $category = new HelpCategory();

        $category->title = $request->getTitle();

        $category = $this->helpCategoryRepository->saveHelpCategory($category);

        $category->slug = Str::slug($request->getTitle(), '-').'-'.$category->id;

        $category = $this->helpCategoryRepository->updateHelpCategory($category);

        return new AddHelpCategoryResponse($category);
    }
}
