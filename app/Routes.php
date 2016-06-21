<?php
/**
 * Routes - all standard Routes are defined here.
 *
 * @author David Carr - dave@daveismyname.com
 * @version 3.0
 */


/** Define static routes. */

// Default Routing
Route::any('', 'App\Controllers\Welcome@index');
Route::any('subpage', 'App\Controllers\Welcome@subPage');

// Demo Routes
Route::any('demo/database',        'App\Controllers\Demo@database');
Route::any('demo/password/(:any)', 'App\Controllers\Demo@password');
Route::any('demo/events',          'App\Controllers\Demo@events');
Route::any('demo/mailer',          'App\Controllers\Demo@mailer');
Route::any('demo/session',         'App\Controllers\Demo@session');
Route::any('demo/validate',        'App\Controllers\Demo@validate');
Route::any('demo/paginate',        'App\Controllers\Demo@paginate');
Route::any('demo/cache',           'App\Controllers\Demo@cache');

Route::any('demo/request(/(:any)(/(:any)(/(:all))))', 'App\Controllers\Demo@request');

Route::any('demo/test/(:any)(/(:any)(/(:any)(/(:all))))', array(
    'filters' => 'test',
    'uses'    => 'App\Controllers\Demo@test'
));

// The Framework's Language Changer.
Route::any('language/(:any)', array(
    'filters' => 'referer',
    'uses'    => 'App\Controllers\Language@change'
));
/** End default Routes */

