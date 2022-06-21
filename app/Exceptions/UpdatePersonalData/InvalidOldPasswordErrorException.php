<?php

namespace App\Exceptions\UpdatePersonalData;

use Exception;

class InvalidOldPasswordErrorException extends Exception
{
    public function render()
    {
        return redirect()
           ->route('user.editPasswordPage', auth()->user()->id)
           ->withErrors(['msg' => $this->getMessage()]);
    }
}
