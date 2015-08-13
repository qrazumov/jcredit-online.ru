<?php

namespace App\Providers;

use App\Services\Widget\SWidget;
use Illuminate\Support\ServiceProvider;

class SWidgetServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->singleton('SWidget', function ($app) {
            return new SWidget();

        });

    }
}
