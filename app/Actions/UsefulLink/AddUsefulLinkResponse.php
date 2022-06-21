<?php

declare(strict_types=1);

namespace App\Actions\UsefulLink;

use App\Contracts\ActionsResponseModelInterface;
use App\Models\UsefulLink;

final class AddUsefulLinkResponse implements ActionsResponseModelInterface
{
    private UsefulLink $usefulLink;

    public function __construct(UsefulLink $usefulLink)
    {
        $this->usefulLink = $usefulLink;
    }

    public function getResponse(): UsefulLink
    {
        return $this->usefulLink;
    }
}
