<?php

namespace App\Http\Controllers;

use App\Actions\Auth\ConfirmedEmailAction;
use App\Actions\Auth\ConfirmedEmailRequest;

class UserController extends Controller
{
    public function confirmUserEmail(ConfirmedEmailAction $confirmedUserAction, int $id, string $hash)
    {
        $verification = $confirmedUserAction->execute(
            new ConfirmedEmailRequest(
                $id,
                $hash,
            )
        );

        return redirect()->route('index');
    }
}
