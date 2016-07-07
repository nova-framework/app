<?php
/**
 * Events - all standard Events are defined here.
 *
 * @author Virgil-Adrian Teaca - virgil@giulianaeassociati.com
 * @version 3.0
 */

/** Define Events. */

// Add a Listener Class to the Event 'test'.
Event::listen('test', 'App\Events\Test@handle');

// Add a Listener Closure to the Event 'test'.
Event::listen('test', function($data) {
    return '<pre>Closure : ' .var_export($data, true) .'</pre>';
});

// Add a Listener Closure to the Event 'nova.framework.booting'.
Event::listen('nova.framework.booting', function() {
    Console::logSpeed("Nova Framework booting");
});

// Add a Listener Closure to the Event 'router.matched'.
Event::listen('router.matched', function($route, $request) {
    View::share('currentUri', $request->path());

    $segments = $request->segments();

    //
    $baseUri = '';

    if(! empty($segments)) {
        // Make the path equal with the first part if it exists, i.e. 'admin'
        $baseUri = array_shift($segments) .'/';

        // Add to path the next part, if it exists, defaulting to 'dashboard'.
        $baseUri .= ! empty($segments) ? array_shift($segments) : 'dashboard';
    }

    View::share('baseUri', $baseUri);
});
