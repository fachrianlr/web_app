<?php

namespace App\Http\Responses;

use Filament\Facades\Filament;
use Illuminate\Http\RedirectResponse;
use Filament\Http\Responses\Auth\LogoutResponse as BaseLogoutResponse;

class CustomLogoutResponse extends BaseLogoutResponse
{
    public function toResponse($request): RedirectResponse
    {
        if (Filament::getCurrentPanel()->getId() != 'admin') {
            $baseUrl = config('app.url') . "/admin";
            return redirect()->to($baseUrl);
        }

        return parent::toResponse($request);
    }
}
