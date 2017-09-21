<?php

/**
 * Events - all standard Events are defined here.
 *
 * @author Virgil-Adrian Teaca - virgil@giulianaeassociati.com
 * @version 3.0
 *
 */


/** Define Events. */

// Add a Listener Closure to the Event 'router.matched'.
Event::listen('router.matched', function($route, $request)
{
    // Share the Application version.
    $path = ROOTDIR .'VERSION.txt';

    if (is_readable($path)) {
        $version = trim(file_get_contents($path));
    } else {
        $version = VERSION;
    }

    View::share('version', $version);

    // Share on Views the CSRF Token.
    View::share('csrfToken', Session::token());
});
