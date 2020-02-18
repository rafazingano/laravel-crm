<?php

namespace ConfrariaWeb\Crm\Providers;

use ConfrariaWeb\Crm\Contracts\StepContract;
use ConfrariaWeb\Crm\Repositories\StepRepository;
use ConfrariaWeb\Crm\Services\StepService;
use Illuminate\Support\ServiceProvider;

class CrmServiceProvider extends ServiceProvider
{

    public function boot()
    {

        $this->loadRoutesFrom(__DIR__ . '/../Routes/api.php');
        $this->loadRoutesFrom(__DIR__ . '/../Routes/web.php');
        $this->loadMigrationsFrom(__DIR__ . '/../Databases/Migrations');
        //$this->loadTranslationsFrom(__DIR__ . '/../Translations', 'crm');
        $this->loadViewsFrom(__DIR__ . '/../Views', 'crm');
        $this->publishes([__DIR__ . '/../../config/cw_crm.php' => config_path('cw_crm.php')], 'cw_crm');

    }

    public function register()
    {
        $this->app->bind(StepContract::class, StepRepository::class);
        $this->app->bind('CrmStepService', function ($app) {
            return new StepService($app->make(StepContract::class));
        });
    }

}
