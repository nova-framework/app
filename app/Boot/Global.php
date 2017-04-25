<?php

//--------------------------------------------------------------------------
// Application Error Logger
//--------------------------------------------------------------------------

Log::useFiles(storage_path() .DS .'logs' .DS .'error.log');

//--------------------------------------------------------------------------
// Application Error Handler
//--------------------------------------------------------------------------

use Nova\Database\ORM\ModelNotFoundException;
use Nova\Session\TokenMismatchException;

use Symfony\Component\HttpKernel\Exception\HttpException;


App::error(function(Exception $exception, $code, $fromConsole)
{
    if (($exception instanceof ModelNotFoundException) || ($exception instanceof HttpException)) {
        // Do not report those types of exception.
        return;
    }

    // When CSRF mismatch.
    else if ($exception instanceof TokenMismatchException) {
        $status = __('Your session expired. Please try again!');

        return Redirect::back()->withStatus($status, 'danger');
    }

    Log::error($exception);

    if ($fromConsole) {
        return 'Error ' .$code .': ' .$e->getMessage()."\n";
    }

    //return '<h1>Error ' .$code .'</h1><p>' .$e->getMessage() .'</p>';
});

// Special handling for the HTTP Exceptions.
App::error(function(HttpException $exception)
{
    $code = $exception->getStatusCode();

    $headers = $exception->getHeaders();

    if (Request::ajax()) {
        // An AJAX request; we'll create a JSON Response.
        $content = array('status' => $code);

        return Response::json($content, $code, $headers);
    }

    // We'll create the templated Error Page Response.
    $view = View::makeLayout('Default')
        ->shares('title', 'Error ' .$code)
        ->nest('content', 'Error/' .$code);

    return Response::make($view, $code, $headers);
});

//--------------------------------------------------------------------------
// Application Missing Route Handler
//--------------------------------------------------------------------------
/*
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

App::missing(function(NotFoundHttpException $exception)
{
    //
});
*/

//--------------------------------------------------------------------------
// Boot Stage Customization
//--------------------------------------------------------------------------

/**
 * Create a constant for the name of the site.
 */
define('SITE_TITLE', $app['config']['app.name']);
