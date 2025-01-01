<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Filament\Http\Responses\Auth\Contracts\LoginResponse;
use Filament\Http\Responses\Auth\Contracts\LogoutResponse;
use App\Http\Responses\CustomLoginResponse;
use App\Http\Responses\CustomLogoutResponse;


class AppServiceProvider extends ServiceProvider
{

    public $singletons = [
        // Contract => Implementation
        LoginResponse::class => CustomLoginResponse::class,
        LogoutResponse::class => CustomLogoutResponse::class,

    ];

    /**
     * Register any application services.
     */
    public function register(): void
    {
        foreach ($this->singletons as $contract => $implementation) {
            $this->app->singleton($contract, $implementation);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
