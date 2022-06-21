<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Model;

interface ActionsResponseModelInterface
{
    public function getResponse(): Model;
}
