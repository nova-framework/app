<?php
/**
 * Routes - all standard Routes are defined here.
 *
 * @author David Carr - dave@daveismyname.com
 * @version 3.0
 */


/** Define static routes. */

// Default Routing
Route::any('',        'App\Controllers\Welcome@index');
Route::any('subpage', 'App\Controllers\Welcome@subPage');

/** End default Routes */

