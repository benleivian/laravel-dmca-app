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

Route::get('/', 'PagesController@home');

/**
 * Dashboard
 */
Route::get('dashboard', ['middleware' => 'auth', 'uses' => 'PagesController@dashboard' ]);

/**
 * Notices
 */
Route::get('notices/create/confirm', 'NoticesController@confirm');
Route::resource('notices', 'NoticesController');

/**
 * Authentication Routes
 */
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

/**
 * Registration Routes
 */
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');