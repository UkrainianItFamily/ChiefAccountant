<?php

declare(strict_types=1);

namespace App\Actions\Help;

use App\Repositories\Help\HelpRepositoryInterface;

final class GetAllHelpsAction
{
    private HelpRepositoryInterface $helpRepository;

    public function __construct(HelpRepositoryInterface $helpRepository)
    {
        $this->helpRepository = $helpRepository;
    }

    public function execute(): GetAllHelpsResponse
    {
        $helps = $this->helpRepository->getAllHelps();

        return new GetAllHelpsResponse($helps);
    }
}
