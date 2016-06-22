<?php

//--------------------------------------------------------------------------
// Application Error Logger
//--------------------------------------------------------------------------

Log::useFiles(storage_path() .'Logs' .DS .'error.log');

//--------------------------------------------------------------------------
// Application Error Handler
//--------------------------------------------------------------------------


App::error(function(Exception $exception, $code)
{
    Log::error($exception);
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
use App\Extensions\Log\Mailer as LogMailer;

LogMailer::initHandler($app);
*/
