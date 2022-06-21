<?php

declare(strict_types=1);

namespace App\Actions\Published;

use App\Contracts\ActionsResponseModelInterface;
use App\Models\Published;

final class AddPublicationResponse implements ActionsResponseModelInterface
{
    private Published $publication;

    public function __construct(Published $publication)
    {
        $this->publication = $publication;
    }

    public function getResponse(): Published
    {
        return $this->publication;
    }
}
