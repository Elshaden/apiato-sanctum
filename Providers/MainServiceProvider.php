<?php

namespace App\Containers\Vendor\Sanctum\Providers;

//use App\Ship\Parents\Providers\ServiceProvider as ParentMainServiceProvider;
use App\Containers\Vendor\Sanctum\Models\Sanctum as SanctumModel;
use Illuminate\Support\ServiceProvider;
use Laravel\Sanctum\Sanctum;
/**
 * The Main Service Provider of this container, it will be automatically registered in the framework.
 */
class MainServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../Configs/sanctum.php' => app_path('Ship/Configs/sanctum.php'),
        ]);
        Sanctum::usePersonalAccessTokenModel(SanctumModel::class);
    }

    /**
     * Register the application services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../Configs/sanctum.php', 'sanctum'
        );
    }


}
