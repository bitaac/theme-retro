<?php

namespace Bitaac\Theme;

use Bitaac\Core\Providers\AggregateServiceProvider;

class RetroThemeServiceProvider extends AggregateServiceProvider
{
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
}
