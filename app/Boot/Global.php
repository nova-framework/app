<?php

use Nova\Auth\Access\AuthorizationException;

use Symfony\Component\HttpKernel\Exception\HttpException;


//--------------------------------------------------------------------------
// Application Error Logger
//--------------------------------------------------------------------------

Log::useFiles(STORAGE_PATH .'logs' .DS .'error.log');

//--------------------------------------------------------------------------
// Application Error Handler
//--------------------------------------------------------------------------

App::error(function (Exception $e, $code)
{
    Log::error($e);
});

App::error(function (HttpException $e, $code)
{
    $code = $e->getStatusCode();

    if (Request::ajax() || Request::wantsJson() || Request::is('api/*')) {
        // An AJAX request; we'll create and return a JSON Response.
        return Response::json(array('error' => $e->getMessage()), $code, $e->getHeaders());
    }

    // We'll create and return a themed Error Page as response.
    $view = View::makeLayout('Default')
        ->shares('title', 'Error ' .$code)
        ->nest('content', 'Errors/' .$code, array('exception' => $e));

    return Response::make($view->render(), $code, $e->getHeaders());
});

App::error(function (AuthorizationException $e, $code)
{
    if (Request::ajax() || Request::wantsJson() || Request::is('api/*')) {
        // On an AJAX Request; we return a response: Error 403 (Access denied)
        return Response::make(array('error' => $e->getMessage()), 403);
    }

    // Get the Guard's dashboard path from configuration.
    $guard = Config::get('auth.defaults.guard', 'web');

    $uri = Config::get("auth.guards.{$guard}.paths.dashboard", 'admin/dashboard');

    $status = __('You are not authorized to access this resource.');

    return Redirect::to($uri)->withStatus($status, 'warning');
});

//--------------------------------------------------------------------------
// Maintenance Mode Handler
//--------------------------------------------------------------------------

App::down(function ()
{
    return Response::make("Be right back!", 503);
});

//--------------------------------------------------------------------------
// Boot Stage Customization
//--------------------------------------------------------------------------

/**
 * Create a constant for the URL of the site.
 */
define('SITEURL', $app['config']['app.url']);

/**
 * Define relative base path.
 */
define('DIR', $app['config']['app.path']);

/**
 * Create a constant for the name of the site.
 */
define('SITETITLE', $app['config']['app.name']);

/**
 * Set a default language.
 */
define('LANGUAGE_CODE', $app['config']['app.locale']);

/**
 * Set the default template.
 */
define('TEMPLATE', $app['config']['app.template']);

/**
 * Set a Site administrator email address.
 */
define('SITEEMAIL', $app['config']['app.email']);

/**
 * Send a E-Mail to administrator (defined on SITEEMAIL) when a Error is logged.
 */
/*
use Shared\Log\Mailer as LogMailer;

LogMailer::initHandler($app);
*/
