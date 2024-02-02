<?php

namespace App\Providers;

use App\Http\Repository\form\FormRepository;
use App\Http\Repository\form\IFormRepository;
use App\Http\Repository\Subscriptions\ISubscriptionRepository;
use App\Http\Repository\Subscriptions\SubscriptionRepository;
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
        $this->app->singleton(IFormRepository::class, FormRepository::class);
        $this->app->singleton(ISubscriptionRepository::class, SubscriptionRepository::class);
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
            IUserTeamRepository::class,
            IFormRepository::class,
            ISubscriptionRepository::class
        ];
    }

}
