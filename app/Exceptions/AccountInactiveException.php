<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\RedirectResponse;

class AccountInactiveException extends Exception
{
    public function render(): RedirectResponse
    {
        return redirect(route('account.inactive'));
    }
}
