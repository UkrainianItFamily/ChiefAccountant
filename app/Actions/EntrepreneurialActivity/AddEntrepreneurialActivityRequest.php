<?php

namespace App\Actions\EntrepreneurialActivity;

class AddEntrepreneurialActivityRequest
{
    private string $name;

    public function __construct(
        string $name
    ) {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
