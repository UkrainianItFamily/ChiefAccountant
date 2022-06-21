<?php

declare(strict_types=1);

namespace App\Actions\App;

use App\Contracts\ActionsResponseModelInterface;
use App\Models\App;

final class AddAppResponse implements ActionsResponseModelInterface
{
    private App $app;

    public function __construct(App $app)
    {
        $this->app = $app;
    }

    public function getResponse(): App
    {
        return $this->app;
    }
}
