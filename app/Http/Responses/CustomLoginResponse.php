<?php

namespace App\Http\Responses;

use Filament\Pages\Dashboard;

use Illuminate\Http\RedirectResponse;
use Livewire\Features\SupportRedirects\Redirector;

class CustomLoginResponse extends \Filament\Http\Responses\Auth\LoginResponse
{
    public function toResponse($request): RedirectResponse|Redirector
    {
        if (1 == 1) {
            return redirect()->intended(Dashboard::getUrl(panel: 'user'));
        }

        return parent::toResponse($request);
    }
}
