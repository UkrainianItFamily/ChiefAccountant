<?php

namespace App\Actions\EntrepreneurialActivity;

use App\Models\EntrepreneurialActivity;
use App\Repositories\EntrepreneurialActivity\EntrepreneurialActivityInterface;

final class AddEntrepreneurialActivityAction
{
    private EntrepreneurialActivityInterface $entrepreneurialActivityRepository;

    public function __construct(EntrepreneurialActivityInterface $entrepreneurialActivityRepository)
    {
        $this->entrepreneurialActivityRepository = $entrepreneurialActivityRepository;
    }

    public function execute(AddEntrepreneurialActivityRequest $request): AddEntrepreneurialActivityResponse
    {
        $entrepreneurialActivity = new EntrepreneurialActivity();
        $entrepreneurialActivity->name = $request->getName();

        $this->entrepreneurialActivityRepository->saveEntrepreneurialActivity($entrepreneurialActivity);

        return new AddEntrepreneurialActivityResponse($entrepreneurialActivity);
    }
}
