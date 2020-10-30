<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'design'], function () {
    Route::view('/', 'design.index');
    Route::get('{view}', 'DesignController@index');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::view('/', 'index')->name('home');
    Route::resource('invoices', 'InvoicesController');
    Route::resource('sections', 'SectionsController')->except(['edit', 'create']);
});

