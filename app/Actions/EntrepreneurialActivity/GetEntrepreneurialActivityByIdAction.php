<?php

namespace App\Actions\EntrepreneurialActivity;

use App\Repositories\EntrepreneurialActivity\EntrepreneurialActivityInterface;

final class GetEntrepreneurialActivityByIdAction
{
    private EntrepreneurialActivityInterface $entrepreneurialActivityRepository;

    public function __construct(EntrepreneurialActivityInterface $entrepreneurialActivityRepository)
    {
        $this->entrepreneurialActivityRepository = $entrepreneurialActivityRepository;
    }

    public function execute(GetEntrepreneurialActivityByIdRequest $request): GetEntrepreneurialActivityByIdResponse
    {
       $entrepreneurialActivity = $this->entrepreneurialActivityRepository->getEntrepreneurialActivityById($request->getId());

       return new GetEntrepreneurialActivityByIdResponse($entrepreneurialActivity);
    }
}
