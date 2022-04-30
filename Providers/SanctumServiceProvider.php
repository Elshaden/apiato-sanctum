<?php

namespace App\Containers\Vendor\Sanctum\Providers;

use App\Containers\Vendor\Sanctum\Models\Sanctum as SanctumModel;
use Illuminate\Support\ServiceProvider;
use Laravel\Sanctum\Sanctum;

/**
 * A custom Service Provider - remember to register it in the MainServiceProvider of this Container.
 */
class SanctumServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Sanctum::usePersonalAccessTokenModel(SanctumModel::class);

    }

    /**
     * Register anything in the container.
     */
    public function register(): void
    {
        parent::register();
        Sanctum::ignoreMigrations();
        // ...
    }
}
