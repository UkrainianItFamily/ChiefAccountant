<?php

declare(strict_types=1);

namespace App\Actions\Published;

use App\Contracts\ActionsResponseModelInterface;
use App\Models\Published;

final class UpdatePublicationResponse implements ActionsResponseModelInterface
{
    private Published $updatedPublication;

    public function __construct(Published $updatedPublication)
    {
        $this->updatedPublication = $updatedPublication;
    }

    public function getResponse(): Published
    {
        return $this->updatedPublication;
    }
}
