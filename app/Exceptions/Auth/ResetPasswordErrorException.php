<?php

namespace App\Exceptions\Auth;

use Exception;

class ResetPasswordErrorException extends Exception
{
    public function render()
    {
        return redirect()
           ->route('index')
           ->withErrors(['msg' => $this->getMessage()]);
    }
}
