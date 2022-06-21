<?php

namespace App\Actions\EntrepreneurialActivity;

use App\Repositories\EntrepreneurialActivity\EntrepreneurialActivityInterface;

final class DeleteEntrepreneurialActivityAction
{
    private EntrepreneurialActivityInterface $entrepreneurialActivityRepository;

    public function __construct(EntrepreneurialActivityInterface $entrepreneurialActivityRepository)
    {
        $this->entrepreneurialActivityRepository = $entrepreneurialActivityRepository;
    }

    public function execute(DeleteEntrepreneurialActivityRequest $request)
    {
        $entrepreneurialActivity = $this->entrepreneurialActivityRepository->getEntrepreneurialActivityById($request->getId());

        $this->entrepreneurialActivityRepository->deleteEntrepreneurialActivity($entrepreneurialActivity);
    }
}
