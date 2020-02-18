<?php

Route::middleware(['auth:api'])
    ->namespace('ConfrariaWeb\Crm\Controllers')
    ->name('api.crm.')
    ->prefix('api/crm')
    ->group(function () {

        Route::name('steps.')
            ->prefix('steps')
            ->group(function () {

                Route::get('select2', 'StepController@select2')->name('select2');

            });

    });

