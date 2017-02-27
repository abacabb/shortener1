<?php

namespace App\Providers;

use App\Contracts\ShortUrl\ShortUrlServiceInterface;
use App\Services\ShortUrl\ShortUrlService;
use App\Services\ShortUrl\Strategy\DatabaseStrategy;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ShortUrlService::class, function ($app) {
            return new ShortUrlService($app->make(DatabaseStrategy::class), $app->make('validator'));
        });

        $this->app->bind(ShortUrlServiceInterface::class, ShortUrlService::class);
    }
}
