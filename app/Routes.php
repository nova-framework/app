<?php
/**
 * Routes - all standard Routes are defined here.
 *
 * @author David Carr - dave@daveismyname.com
 * @version 3.0
 */


/** Define static routes. */

// Default Routing
Route::any('', function() {
    $content = __('Yep! It works.');

    $view = View::make('Default')
        ->shares('title', __('Welcome'))
        ->withContent($content);

    return Layout::make('default')->withContent($view);
});

// The Language Changer
Route::any('language/{language}', array('before' => 'referer', function($language)
{
    $languages = Config::get('languages');

    if (in_array($language, array_keys($languages))) {
        Session::set('language', $language);

        // Store also the current Language in a Cookie lasting five years.
        Cookie::queue(PREFIX .'language', $language, Cookie::FIVEYEARS);
    }

    return Redirect::back();

}))->where('language', '([a-z]{2})');

/** End default Routes */
