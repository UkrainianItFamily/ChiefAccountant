<?php

namespace App\Actions\EntrepreneurialActivity;

use App\Repositories\EntrepreneurialActivity\EntrepreneurialActivityInterface;

final class GetAllListEntrepreneurialActivityAction
{
    private EntrepreneurialActivityInterface $entrepreneurialActivityRepository;

    public function __construct(EntrepreneurialActivityInterface $entrepreneurialActivityRepository)
    {
        $this->entrepreneurialActivityRepository = $entrepreneurialActivityRepository;
    }

    public function execute(): GetAllListEntrepreneurialActivityResponse
    {
        $entrepreneurialActivity = $this->entrepreneurialActivityRepository->getAllEntrepreneurialActivity();

        return new GetAllListEntrepreneurialActivityResponse($entrepreneurialActivity);
    }
}
