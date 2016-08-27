<?php

namespace App\Modules\Files\Controllers\Admin;

use App\Core\BackendController;
use Nova\Routing\FileDispatcher;
use Nova\Routing\Route;

use Symfony\Component\HttpFoundation\Request as SymfonyRequest;

use Auth;
use Request;
use Response;
use View;


class Files extends BackendController
{
    private $dispatcher;


    public function __construct()
    {
        parent::__construct();

        //
        $this->beforeFilter('@filterRequests');
    }

    /**
     * Filter the incoming requests.
     */
    public function filterRequests(Route $route, SymfonyRequest $request)
    {
        // Check the User Authorization - while using the Extended Auth Driver.
        if (! Auth::user()->hasRole('administrator')) {
            $status = __d('users', 'You are not authorized to access this resource.');

            return Redirect::to('admin/dashboard')->withStatus($status, 'warning');
        }
    }

    public function index()
    {
        return $this->getView()
            ->shares('title', __d('files', 'Files'));
    }

    public function connector()
    {
        // Disable the auto-rendering on a (Template) Layout.
        $this->layout = false;

        return $this->getView();
    }

    public function preview($path)
    {
        // Calculate the Preview file path.
        $path = str_replace('/', DS, ROOTDIR .ltrim($path, '/'));

        return $this->serveFile($path);
    }

    public function thumbnails($thumbnail)
    {
        // Calculate the thumbnail file path.
        $path = str_replace('/', DS, APPDIR .'Storage/Files/thumbnails/' .$thumbnail);

        return $this->serveFile($path);
    }

    /**
     * Return a Symfony Response instance for serving a File
     *
     * @param string $path
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function serveFile($path)
    {
        $request = Request::instance();

        // Get a File Dispatcher instance.
        $dispatcher = $this->getDispatcher();

        return $dispatcher->serve($path, $request);
    }

    /**
     * Return a Files Dispatcher instance
     *
     * @return \Routing\FileDispatcher
     */
    protected function getDispatcher()
    {
        return $this->dispatcher ?: $this->dispatcher = new FileDispatcher();
    }

}
