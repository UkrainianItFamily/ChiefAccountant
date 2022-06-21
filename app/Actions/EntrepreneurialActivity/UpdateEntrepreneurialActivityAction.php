<?php

namespace App\Actions\EntrepreneurialActivity;

use App\Repositories\EntrepreneurialActivity\EntrepreneurialActivityInterface;

final class UpdateEntrepreneurialActivityAction
{
    private EntrepreneurialActivityInterface $entrepreneurialActivityRepository;

    public function __construct(EntrepreneurialActivityInterface $entrepreneurialActivityRepository)
    {
        $this->entrepreneurialActivityRepository = $entrepreneurialActivityRepository;
    }

    public function execute(UpdateEntrepreneurialActivityRequest $request): UpdateEntrepreneurialActivityResponse
    {
        $entrepreneurialActivity = $this->entrepreneurialActivityRepository->getEntrepreneurialActivityById($request->getId());
        $entrepreneurialActivity->name = $request->getName();

        $entrepreneurialActivity = $this->entrepreneurialActivityRepository->updateEntrepreneurialActivity($entrepreneurialActivity);

        return new UpdateEntrepreneurialActivityResponse($entrepreneurialActivity);
    }
}
