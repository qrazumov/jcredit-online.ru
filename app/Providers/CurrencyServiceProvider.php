<?php

namespace App\Providers;

use App\Services\Currency;
use Illuminate\Support\ServiceProvider;


/**
 * Class HelloWorldServiceProvider
 * @package App\Providers
 */
class CurrencyServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->singleton('Currency', function ($app) {
            return new Currency();

        });

//        $this->app['helloworld'] = $this->app->share(function ($app) { можно и так
//            return new HelloWorld();
//        });


    }

}