<?php

namespace App\Providers;

use App\Http\Repository\User\IUserRepository;
use App\Http\Repository\User\UserRepository;
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
          IUserRepository::class
        ];
    }

}
