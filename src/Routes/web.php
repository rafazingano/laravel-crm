<?php
Route::middleware(['web', 'auth'])
    ->namespace('ConfrariaWeb\Crm\Controllers')
    ->group(function () {

        Route::prefix('crm')
            ->name('crm.')
            ->group(function () {

                Route::resource('steps', 'StepController');
                Route::name('steps.')->prefix('steps')->group(function () {
                    Route::get('trashed', 'StepController@trashed')->name('trashed');
                });

            });
    });