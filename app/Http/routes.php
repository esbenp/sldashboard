<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'DashboardController@validateInstallation');

Route::get('layout',function(){
    return view('dashboard.index');
});

// Installation
Route::group(['prefix' => 'install'], function () {
    Route::get('/', 'InstallationController@config');
    Route::post('/', 'InstallationController@configStore');

    Route::get('/user', 'InstallationController@user');
    Route::post('/user', 'InstallationController@userStore');
});

// Dashboard
Route::get('/dashboard', ['middleware' => 'auth', 'uses' => 'DashboardController@index']);

// Configuration
Route::group(['prefix' => 'configuration', 'middleware' => 'auth'], function () {
    Route::get('/', 'ConfigurationController@index');
    Route::get('/dashboard', 'ConfigurationController@dashboard');
});

// Authentication
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');