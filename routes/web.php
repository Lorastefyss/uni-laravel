<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '/', 'as' => 'home.'], function () {
    Route::get('', 'App\Http\Controllers\HomeController@index')->name('index');
    Route::get('/create', 'App\Http\Controllers\HomeController@create')->name('create');

});
