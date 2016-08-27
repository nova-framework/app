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

// The Framework's Language Changer.
Route::any('language/{locale}', array(
    'before' => 'referer',
    'uses'    => 'App\Controllers\Language@change'
));
/** End default Routes */

