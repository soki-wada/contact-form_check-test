<?php

namespace App\Actions\Fortify;

use Laravel\Fortify\Contracts\LogoutResponse;
use Illuminate\Http\RedirectResponse;

class CustomLogoutResponse implements LogoutResponse
{
    public function toResponse($request): RedirectResponse
    {
        return redirect('/login'); 
    }
}
