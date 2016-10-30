<?php

namespace Bitaac\Theme;

use Bitaac\Core\Providers\AggregateServiceProvider;

class RetroThemeServiceProvider extends AggregateServiceProvider
{
    /**
     * Holds all of the service providers we want to register.
     *
     * @var array
     */
    protected $providers = [
        //
    ];

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'bitaac');

        $this->publishes([
            __DIR__.'/../public' => public_path('bitaac/retro-theme'),
        ], 'public');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
