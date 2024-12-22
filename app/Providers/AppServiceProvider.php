<?php

namespace App\Providers;

use App\Http\Resources\RoleResource;
use App\Http\Resources\UserResource;
use Illuminate\Support\ServiceProvider;
use App\Http\Resources\PermissionResource;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        UserResource::withoutWrapping();
        RoleResource::withoutWrapping();
        PermissionResource::withoutWrapping();
    }
}
