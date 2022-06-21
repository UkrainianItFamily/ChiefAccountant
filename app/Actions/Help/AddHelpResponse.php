<?php

declare(strict_types=1);

namespace App\Actions\Help;

use App\Contracts\ActionsResponseModelInterface;
use App\Models\Help;

final class AddHelpResponse implements ActionsResponseModelInterface
{
    private Help $help;

    public function __construct(Help $help)
    {
        $this->help = $help;
    }

    public function getResponse(): Help
    {
        return $this->help;
    }
}
