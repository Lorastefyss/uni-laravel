<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '/', 'as' => 'client.'], function () {
    Route::get('', 'App\Http\Controllers\HomeController@index')->name('index');
    Route::get('/show/{event}', 'App\Http\Controllers\HomeController@show')->name('show');
});

Route::get('/login', 'App\Http\Controllers\AdminLoginController@index')->name('login.index');

Route::middleware(['auth'])->group(function () {
    Route::group(['prefix' => '/admin', 'as' => 'admin.'], function () {
        Route::get('/', 'App\Http\Controllers\Admin\UsersController@index')->name('index');
        Route::get('/create', 'App\Http\Controllers\Admin\UsersController@create')->name('create');
        Route::post('/store', 'App\Http\Controllers\Admin\UsersController@store')->name('store');
        Route::group(['prefix' => "{user}"], function () {
            Route::get('/edit', 'App\Http\Controllers\Admin\UsersController@edit')->name('edit');
            Route::put('/update', 'App\Http\Controllers\Admin\UsersController@update')->name('update');
            Route::delete('/delete', 'App\Http\Controllers\Admin\UsersController@destroy')->name('destroy');
        });

        Route::group(['prefix' => '/events', 'as' => 'events.'], function () {
            Route::get('/', 'App\Http\Controllers\Admin\AdminEventsController@index')->name('index');
            Route::get('/create', 'App\Http\Controllers\Admin\AdminEventsController@create')->name('create');
            Route::post('/store', 'App\Http\Controllers\Admin\AdminEventsController@store')->name('store');
            Route::group(['prefix' => "{event}"], function () {
                Route::get('/edit', 'App\Http\Controllers\Admin\AdminEventsController@edit')->name('edit');
                Route::put('/update', 'App\Http\Controllers\Admin\AdminEventsController@update')->name('update');
                Route::delete('/delete', 'App\Http\Controllers\Admin\AdminEventsController@destroy')->name('destroy');
            });
        });

        Route::group(['prefix' => '/archives', 'as' => 'archives.'], function () {
            Route::get('{archive}', 'App\Http\Controllers\Admin\AdminArchiveController@destroy')->name('destroy');
        });
    });
});