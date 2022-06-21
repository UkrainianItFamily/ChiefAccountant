<?php

namespace App\Actions\EntrepreneurialActivity;

use App\Contracts\ActionsResponseModelInterface;
use App\Models\EntrepreneurialActivity;

final class UpdateEntrepreneurialActivityResponse implements ActionsResponseModelInterface
{
    private EntrepreneurialActivity $updatedEntrepreneurialActivity;

    public function __construct(EntrepreneurialActivity $updatedEntrepreneurialActivity)
    {
        $this->updatedEntrepreneurialActivity= $updatedEntrepreneurialActivity;
    }

    public function getResponse(): EntrepreneurialActivity
    {
        return $this->updatedEntrepreneurialActivity;
    }
}
