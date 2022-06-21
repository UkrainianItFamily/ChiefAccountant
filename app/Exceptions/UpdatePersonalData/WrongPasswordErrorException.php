<?php

namespace App\Exceptions\UpdatePersonalData;

use Exception;

class WrongPasswordErrorException extends Exception
{
    public function render()
    {
        return redirect()
           ->route('user.personalPage', auth()->user()->id)
           ->withErrors(['msg' => $this->getMessage()]);
    }
}
