<?php

namespace App\Providers;

use App\Contracts\CurrencyConverterContract;
use App\Services\BankRates\CentralBank;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CurrencyConverterContract::class, function($app) {
            return new CentralBank();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
