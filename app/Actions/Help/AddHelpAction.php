<?php

declare(strict_types=1);

namespace App\Actions\Help;

use App\Models\Help;
use App\Repositories\Help\HelpRepositoryInterface;
use Illuminate\Support\Str;

final class AddHelpAction
{
    private HelpRepositoryInterface $helpRepository;

    public function __construct(HelpRepositoryInterface $helpRepository)
    {
        $this->helpRepository = $helpRepository;
    }

    public function execute(AddHelpRequest $request): AddHelpResponse
    {
        $help = new Help();

        $help->title = $request->getTitle();
        $help->description = $request->getDescription();
        $help->category_id = $request->getCategoryId();

        $help = $this->helpRepository->saveHelp($help);

        $help->slug = Str::slug($request->getTitle(), '-') . "-" . $help->id;

        $help = $this->helpRepository->updateHelp($help);

        return new AddHelpResponse($help);
    }
}
