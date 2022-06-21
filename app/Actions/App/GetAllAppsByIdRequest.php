<?php

declare(strict_types=1);

namespace App\Actions\App;

class GetAllAppsByIdRequest
{
    private ?int $appId;

    public function __construct(?int $appId)
    {
        $this->appId = $appId;
    }

    public function getId(): ?int
    {
        return $this->appId;
    }
}
