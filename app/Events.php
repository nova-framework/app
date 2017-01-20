<?php
/**
 * Events - all standard Events are defined here.
 *
 * @author Virgil-Adrian Teaca - virgil@giulianaeassociati.com
 * @version 4.0
 */

/** Define Events. */

// Add a Listener Closure to the Event 'router.matched'.
Event::listen('router.matched', function($route, $request)
{
    // Share the Application version.
    $path = BASEPATH .'VERSION.txt';

    if (is_readable($path)) {
        $version = file_get_contents($path);
    } else {
        $version = VERSION;
    }

    View::share('version', trim($version));
});
