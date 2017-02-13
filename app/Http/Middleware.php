<?php
/**
 * Routing Middleware - all standard Routing Middleware are defined here.
 *
 * @author Virgil-Adrian Teaca - virgil@giulianaeassociati.com
 * @version 4.0
 */


// The CSRF Filter.
Route::middleware('csrf', 'App\Http\Middleware\VerifyCsrfToken');

// Referer checking Filter.
Route::middleware('referer', function($request, $next)
{
    // Check if the visitor come to this Route from another site.
    $referer = $request->header('referer');

    if(! starts_with($referer, Config::get('app.url'))) {
        // When Referrer is invalid, respond with Error 400 (Bad Request)
        App::abort(400, 'Bad Request');
    }

    return $next($request);
});

// Authentication Filters.
Route::middleware('auth', function($request, $next)
{
    if (Auth::check()) {
        return $next($request);
    }

    // User is not authenticated.
    else if ($request->ajax() || $request->wantsJson()) {
        return Response::make('Unauthorized Access', 403);
    } else {
        return Redirect::guest('login');
    }
});

Route::middleware('auth.basic', function($request, $next)
{
    if (! is_null($response = Auth::basic())) {
        return $response;
    }

    return $next($request);
});

Route::middleware('guest', function($request, $next)
{
    if (Auth::guest()) {
        return $next($request);
    }

    // User is authenticated.
    else if ($request->ajax() || $request->wantsJson()) {
        return Response::make('Unauthorized Access', 403);
    } else {
        return Redirect::to('admin/dashboard');
    }
});
