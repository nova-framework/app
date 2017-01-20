<?php
/**
 * Routes - all standard Routes are defined here.
 *
 * @author David Carr - dave@daveismyname.com
 * @version 4.0
 */


/** Define static routes. */

// Default Routing
Route::any('', function() {
    $content = __('Yep! It works.');

    /*
    $view = View::make('Default')
        ->shares('title', __('Welcome'))
        ->withContent($content);

    $template = View::makeLayout('default')->withContent($view);
    */

    $template = View::makeLayout('default')
        ->shares('title', __('Welcome'))
        ->nest('content', 'Default', array('content' => $content));

    return Response::make($template);
});

// The Framework's Language Changer.
Route::any('language/{locale}', array('before' => 'referer', function($language)
{
    $languages = Config::get('languages');

    // Only set language if it's in the Languages array
    if (preg_match ('/[a-z]/', $language) && in_array($language, array_keys($languages))) {
        Session::set('language', $language);

        // Store the current Language in a Cookie lasting five years.
        Cookie::queue(PREFIX .'language', $language, Cookie::FIVEYEARS);
    }

    return Redirect::back();
}));

/** End default Routes */

