<?php
/**
 * Controller - A base Controller for the demos included.
 *
 * @author Virgil-Adrian Teaca - virgil@giulianaeassociati.com
 * @version 3.0
 */

namespace App\Core;

use Nova\Http\Response;
use Nova\Routing\Controller as BaseController;
use Nova\Routing\Route;

use Symfony\Component\HttpFoundation\Request as SymfonyRequest;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

use View;


class Controller extends BaseController
{
    protected $template = 'AdminLte';
    protected $layout   = 'backend';


    public function __construct()
    {
        $this->beforeFilter('@setupVariables');
    }

    /**
     * Filter the incoming requests.
     */
    public function setupVariables(Route $route, SymfonyRequest $request)
    {
        $parts = $request->segments();

        // Make the path equal with the first part if it exists, i.e. 'admin'
        $baseUri = array_shift($parts) .'/';

        // Add to path the next part, if it exists, defaulting to 'dashboard'.
        $baseUri .= ! empty($parts) ? array_shift($parts) : 'dashboard';

        //
        View::share('currentUri', $request->path());
        View::share('baseUri',    $baseUri);
    }
}
