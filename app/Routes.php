<?php
/**
 * Routes - all standard Routes are defined here.
 *
 * @author Virgil-Adrian Teaca - virgil@giulianaeassociati.com
 * @version 4.0
 */


// The Default Route.
Route::any('/', function()
{
    // Create a View instance.
    $view = View::make('Default')
        ->shares('title', __('Welcome'))
        ->with('content', __('Yep! It works.'));

    // Create a Layout instance and return it.
    return View::makeLayout('Default')->with('content', $view);
});

// The Language Changer.
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
