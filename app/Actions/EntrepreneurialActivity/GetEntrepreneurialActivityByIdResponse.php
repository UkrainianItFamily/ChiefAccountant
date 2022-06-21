<?php

namespace App\Actions\EntrepreneurialActivity;

use App\Contracts\ActionsResponseModelInterface;
use App\Models\EntrepreneurialActivity;

final class GetEntrepreneurialActivityByIdResponse implements ActionsResponseModelInterface
{
    private EntrepreneurialActivity $entrepreneurialActivity;

    public function __construct(EntrepreneurialActivity $entrepreneurialActivity)
    {
        $this->entrepreneurialActivity = $entrepreneurialActivity;
    }

    public function getResponse(): EntrepreneurialActivity
    {
        return $this->entrepreneurialActivity;
    }
}
