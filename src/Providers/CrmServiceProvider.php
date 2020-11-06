<?php

namespace ConfrariaWeb\Crm\Providers;

use ConfrariaWeb\Crm\Contracts\LeadContract;
use ConfrariaWeb\Crm\Repositories\LeadRepository;
use ConfrariaWeb\Crm\Services\LeadService;
use Illuminate\Support\ServiceProvider;

class CrmServiceProvider extends ServiceProvider
{

    public function boot()
    {

        //$this->loadRoutesFrom(__DIR__ . '/../Routes/api.php');
        $this->loadRoutesFrom(__DIR__ . '/../Routes/web.php');
        $this->loadMigrationsFrom(__DIR__ . '/../../databases/Migrations');
        $this->loadViewsFrom(__DIR__ . '/../Views', 'crm');
        //$this->publishes([__DIR__ . '/../../config/cw_crm.php' => config_path('cw_crm.php')], 'config');

    }

    public function register()
    {
        $this->app->bind(LeadContract::class, LeadRepository::class);
        $this->app->bind('LeadService', function ($app) {
            return new LeadService($app->make(LeadContract::class));
        });
    }

}
