<?php

namespace App\Exceptions\Auth;

use Exception;

class UserNotFoundException extends Exception
{
    public function render()
    {
        return redirect()
            ->back()
            ->withInput()
            ->withErrors(['msg' => $this->getMessage()]);
    }
}
