<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '/', 'as' => 'home.'], function () {
    Route::get('', 'App\Http\Controllers\HomeController@index')->name('index');
});

Route::get('/login', 'App\Http\Controllers\AdminLoginController@index')->name('login.index');


Route::group(['prefix' => '/admin', 'as' => 'admin.', 'middlewares' => ['auth', 'admin.only']], function () {
    Route::get('/', 'App\Http\Controllers\AdminController@index')->name('index');
});