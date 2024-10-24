<?php
namespace Avcodewizard\BlockByCountry;

use Illuminate\Support\ServiceProvider;

class BlockByCountryServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/blockbycountry.php' => config_path('blockbycountry.php'),
        ],'config');

        // Register middleware
        $this->app['router']->aliasMiddleware('block.country', \Avcodewizard\BlockByCountry\Middleware\BlockCountry::class);
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/blockbycountry.php', 'blockbycountry');
    }
}
