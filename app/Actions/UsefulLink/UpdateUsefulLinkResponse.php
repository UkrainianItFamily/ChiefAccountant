<?php

declare(strict_types=1);

namespace App\Actions\UsefulLink;

use App\Contracts\ActionsResponseModelInterface;
use App\Models\UsefulLink;

final class UpdateUsefulLinkResponse implements ActionsResponseModelInterface
{
    private UsefulLink $updatedUsefulLink;

    public function __construct(UsefulLink $updatedUsefulLink)
    {
        $this->updatedUsefulLink = $updatedUsefulLink;
    }

    public function getResponse(): UsefulLink
    {
        return $this->updatedUsefulLink;
    }
}
