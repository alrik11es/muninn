<?php
namespace App\OpenFaas;

use Illuminate\Support\ServiceProvider;

class OpenFaasProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->bind('App\OpenFaas\OpenFaas', function ($app) {
            return new \App\OpenFaas\OpenFaas();
        });
    }
}
