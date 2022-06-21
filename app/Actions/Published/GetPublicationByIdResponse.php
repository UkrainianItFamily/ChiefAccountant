<?php

declare(strict_types=1);

namespace App\Actions\Published;

use App\Contracts\ActionsResponseModelInterface;
use App\Models\Published;

final class GetPublicationByIdResponse implements ActionsResponseModelInterface
{
    private Published $published;

    public function __construct(Published $published)
    {
        $this->published = $published;
    }

    public function getResponse(): Published
    {
        return $this->published;
    }
}
