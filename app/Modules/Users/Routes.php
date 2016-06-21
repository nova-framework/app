<?php
/**
 * Routes - all Module's specific Routes are defined here.
 *
 * @author Virgil-Adrian Teaca - virgil@giulianaeassociati.com
 * @version 3.0
 */


/** Define static routes. */

// The default Auth Routes.
Route::get('login',  array(
    'filters' => 'guest',
    'uses' => 'App\Modules\Users\Controllers\Authorize@login'
));

Route::post('login', array(
    'filters' => 'guest|csrf',
    'uses' => 'App\Modules\Users\Controllers\Authorize@postLogin'
));

Route::get('logout', array(
    'filters' => 'auth',
    'uses' => 'App\Modules\Users\Controllers\Authorize@logout'
));

// The Password Remind.
Route::get('password/remind', array(
    'filters' => 'guest',
    'uses' => 'App\Modules\Users\Controllers\Authorize@remind'
));

Route::post('password/remind', array(
    'filters' => 'guest|csrf',
    'uses' => 'App\Modules\Users\Controllers\Authorize@postRemind'
));

// The Password Reset.
Route::get('password/reset(/(:any))', array(
    'filters' => 'guest',
    'uses' => 'App\Modules\Users\Controllers\Authorize@reset'
));

Route::post('password/reset', array(
    'filters' => 'guest|csrf',
    'uses' => 'App\Modules\Users\Controllers\Authorize@postReset'
));

// The Account Registration.
Route::get('register', array(
    'filters' => 'guest',
    'uses' => 'App\Modules\Users\Controllers\Registrar@create'
));

Route::post('register', array(
    'filters' => 'guest|csrf',
    'uses' => 'App\Modules\Users\Controllers\Registrar@store'
));

Route::get('register/verify/(:any)', array(
    'filters' => 'guest',
    'uses' => 'App\Modules\Users\Controllers\Registrar@verify'
));

Route::get('register/status', array(
    'filters' => 'guest',
    'uses' => 'App\Modules\Users\Controllers\Registrar@status'
));

// The Adminstration Routes.
Route::group(array('prefix' => 'admin', 'namespace' => 'App\Modules\Users\Controllers\Admin'), function() {
    // The User's Profile.
    Route::get( 'users/profile', array('filters' => 'auth',      'uses' => 'Users@profile'));
    Route::post('users/profile', array('filters' => 'auth|csrf', 'uses' => 'Users@postProfile'));

    // The Users CRUD.
    Route::get( 'users',                array('filters' => 'auth',      'uses' => 'Users@index'));
    Route::get( 'users/create',         array('filters' => 'auth',      'uses' => 'Users@create'));
    Route::post('users',                array('filters' => 'auth|csrf', 'uses' => 'Users@store'));
    Route::get( 'users/(:num)',         array('filters' => 'auth',      'uses' => 'Users@show'));
    Route::get( 'users/(:num)/edit',    array('filters' => 'auth',      'uses' => 'Users@edit'));
    Route::post('users/(:num)',         array('filters' => 'auth|csrf', 'uses' => 'Users@update'));
    Route::post('users/(:num)/destroy', array('filters' => 'auth|csrf', 'uses' => 'Users@destroy'));

    // The Users Search.
    Route::post( 'users/search', array('filters' => 'auth', 'uses' => 'Users@search'));

    // The Roles CRUD.
    Route::get( 'roles',                array('filters' => 'auth',      'uses' => 'Roles@index'));
    Route::get( 'roles/create',         array('filters' => 'auth',      'uses' => 'Roles@create'));
    Route::post('roles',                array('filters' => 'auth|csrf', 'uses' => 'Roles@store'));
    Route::get( 'roles/(:num)',         array('filters' => 'auth',      'uses' => 'Roles@show'));
    Route::get( 'roles/(:num)/edit',    array('filters' => 'auth',      'uses' => 'Roles@edit'));
    Route::post('roles/(:num)',         array('filters' => 'auth|csrf', 'uses' => 'Roles@update'));
    Route::post('roles/(:num)/destroy', array('filters' => 'auth|csrf', 'uses' => 'Roles@destroy'));
});
