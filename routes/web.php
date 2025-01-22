<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '/', 'as' => 'client.'], function () {
    Route::get('', 'App\Http\Controllers\HomeController@index')->name('index');
});

Route::get('/login', 'App\Http\Controllers\AdminLoginController@index')->name('login.index');


Route::group(['prefix' => '/admin', 'as' => 'admin.', 'middlewares' => ['auth', 'admin.only']], function () {
    Route::get('/', 'App\Http\Controllers\Admin\UsersController@index')->name('index');
    Route::get('/create', 'App\Http\Controllers\Admin\UsersController@create')->name('create');
    Route::post('/store', 'App\Http\Controllers\Admin\UsersController@store')->name('store');
    Route::group(['prefix' => "{user}"], function() {
        Route::get('/edit', 'App\Http\Controllers\Admin\UsersController@edit')->name('edit');
        Route::put('/update', 'App\Http\Controllers\Admin\UsersController@update')->name('update');
        Route::delete('/delete', 'App\Http\Controllers\Admin\UsersController@destroy')->name('destroy');
    });
});