<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['web'])
    ->prefix('crm')
    ->name('crm.')
    ->group(function () {

        Route::namespace('ConfrariaWeb\Crm\Controllers\Frontend')
            ->group(function () {
                Route::get('contact', function(){
                    return 'OK';
                })->name('contact');
            });

        Route::middleware(['auth'])
            ->namespace('ConfrariaWeb\Crm\Controllers\Backend')
            ->group(function () {
                Route::prefix('leads')
                    ->name('leads.')
                    ->group(function () {
                        Route::get('trashed', 'LeadController@trashed')->name('trashed');
                        Route::get('datatable', 'LeadController@datatables')->name('datatables');
                    });
                Route::resource('leads', 'LeadController');
                Route::prefix('segments')
                    ->name('segments.')
                    ->group(function () {
                        Route::get('trashed', 'SegmentController@trashed')->name('trashed');
                        Route::get('datatable', 'SegmentController@datatables')->name('datatables');
                    });
                Route::resource('segments', 'SegmentController');
                Route::name('steps.')->prefix('steps')->group(function () {
                    Route::get('trashed', 'StepController@trashed')->name('trashed');
                });
                Route::resource('steps', 'StepController');
            });

    });