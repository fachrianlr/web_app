<?php

namespace App\Http\Responses;

use Filament\Pages\Dashboard;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\RedirectResponse;
use Livewire\Features\SupportRedirects\Redirector;

class CustomLoginResponse extends \Filament\Http\Responses\Auth\LoginResponse
{
    public function toResponse($request): RedirectResponse|Redirector
    {
        $role_name = Auth::user()->role->name;
        if ($role_name === 'admin') {
            return redirect()->intended(Dashboard::getUrl(panel: 'admin'));
        } else if ($role_name === 'user') {
            return redirect()->intended(Dashboard::getUrl(panel: 'user'));
        }

        return parent::toResponse($request);
    }
}
