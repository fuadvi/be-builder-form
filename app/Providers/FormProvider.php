<?php

namespace App\Providers;

use App\Http\Repository\User\IUserRepository;
use App\Http\Repository\User\UserRepository;
use App\Http\Repository\UserTeam\IUserTeamRepository;
use App\Http\Repository\UserTeam\UserTeamRepository;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class FormProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(IUserRepository::class, UserRepository::class);
        $this->app->singleton(IUserTeamRepository::class, UserTeamRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }

    public function provides(): array
    {
        return [
          IUserRepository::class,
          IUserTeamRepository::class
        ];
    }

}
