<?php

namespace App\Platform\Exceptions;

use Nova\Auth\AuthenticationException;
use Nova\Foundation\Exceptions\Handler as ExceptionHandler;
use Nova\Http\Request;
use Nova\Session\TokenMismatchException;
use Nova\Support\Facades\Config;
use Nova\Support\Facades\Redirect;
use Nova\Support\Facades\Response;
use Nova\Support\Facades\View;

use Symfony\Component\Debug\Exception\FlattenException;
use Symfony\Component\HttpKernel\Exception\HttpException;

use Exception;


class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = array(
        'Nova\Auth\AuthenticationException',
        'Nova\Database\ORM\ModelNotFoundException',
        'Nova\Session\TokenMismatchException',
        'Nova\Validation\ValidationException',
        'Symfony\Component\HttpKernel\Exception\HttpException',
    );

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = array(
        'password',
        'password_confirmation',
    );


    /**
     * Report or log an exception.
     *
     * @param  \Exception  $e
     * @return void
     */
    public function report(Exception $e)
    {
        return parent::report($e);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Nova\Http\Request  $request
     * @param  \Exception  $e
     * @return \Nova\Http\Response
     */
    public function render(Request $request, Exception $e)
    {
        if ($e instanceof TokenMismatchException) {
            return Redirect::back()
                ->withInput($request->except($this->dontFlash))
                ->with('danger', __('Validation Token has expired. Please try again!'));
        }

        return parent::render($request, $e);
    }

    /**
     * Render the given HttpException.
     *
     * @param  \Symfony\Component\HttpKernel\Exception\HttpException  $e
     * @param  \Nova\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function renderHttpException(HttpException $e, Request $request)
    {
        if (! is_null($response = $this->createErrorResponse($e, $request))) {
            return $response;
        }

        return parent::renderHttpException($e, $request);
    }

    /**
     * Convert the given exception into a Response instance which contains an error page.
     *
     * @param  \Symfony\Component\HttpKernel\Exception\HttpException  $e
     * @param  \Nova\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function createErrorResponse(HttpException $e, Request $request)
    {
        $status = $e->getStatusCode();

        $e = FlattenException::create($e, $status);

        if ($this->isAjaxRequest($request)) {
            return Response::json($e->toArray(), $status, $e->getHeaders());
        }

        //
        else if (! View::exists("Errors/{$status}")) {
            return;
        }

        $view = View::make('Layouts/Default')
            ->shares('title', "Error {$status}")
            ->nest('content', "Errors/{$status}", array('exception' => $e));

        return Response::make($view->render(), $status, $e->getHeaders());
    }

    /**
     * Returns true if the given Request instance is AJAX.
     *
     * @param  \Nova\Http\Request  $request
     * @return bool
     */
    protected function isAjaxRequest(Request $request)
    {
        return ($request->ajax() || $request->wantsJson());
    }

    /**
     * Convert the given exception into a Response instance.
     *
     * @param  \Exception  $e
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function convertExceptionToResponse(Exception $e, Request $request)
    {
        if (! Config::get('app.debug', false)) {
            $exception = new HttpException(500, 'Internal Server Error');

            return $this->createErrorResponse($exception, $request);
        }

        return parent::convertExceptionToResponse($e, $request);
    }

    /**
     * Convert an authentication exception into an unauthenticated response.
     *
     * @param  \Nova\Http\Request  $request
     * @param  \Nova\Auth\AuthenticationException  $exception
     * @return \Nova\Http\Response
     */
    protected function unauthenticated(Request $request, AuthenticationException $exception)
    {
        if ($this->isAjaxRequest($request) || $request->is('api/*')) {
            return Response::json(array('error' => 'Unauthenticated.'), 401);
        }

        $guards = $exception->guards();

        // We will use the first guard.
        $guard = array_shift($guards);

        $uri = Config::get("auth.guards.{$guard}.paths.authorize", 'login');

        return Redirect::guest($uri);
    }
}
