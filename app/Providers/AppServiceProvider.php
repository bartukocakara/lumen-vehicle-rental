<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\Abstracts\IAuthRepository;
use App\Repositories\Concrete\AuthRepository;
use App\Services\Abstracts\IAuthService;
use App\Services\Concrete\AuthService;
use App\Repositories\Abstracts\IPasswordRepository;
use App\Repositories\Concrete\PasswordRepository;
use App\Services\Abstracts\IPasswordService;
use App\Services\Concrete\PasswordService;
use App\Repositories\Abstracts\IReservationRepository;
use App\Repositories\Concrete\ReservationRepository;
use App\Services\Abstracts\IReservationService;
use App\Services\Concrete\ReservationService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(IAuthService::class, AuthService::class);
        $this->app->bind(IAuthRepository::class, AuthRepository::class);
        $this->app->bind(IPasswordService::class, PasswordService::class);
        $this->app->bind(IPasswordRepository::class, PasswordRepository::class);
        $this->app->bind(IReservationService::class, ReservationService::class);
        $this->app->bind(IReservationRepository::class, ReservationRepository::class);
    }
}
