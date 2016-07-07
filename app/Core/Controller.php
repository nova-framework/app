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
use Nova\View\View as BaseView;

use Symfony\Component\HttpFoundation\Request as SymfonyRequest;

use Config;
use Template;
use View;


class Controller extends BaseController
{
    /**
     * The Module name.
     *
     * @var string|null
     */
    private $module = null;

    /**
     * The Default View.
     *
     * @var string
     */
    private $defaultView;

    /**
     * The currently used Template.
     *
     * @var string
     */
    protected $template;


    /**
     * Create a new Controller instance
     */
    public function __construct()
    {
        if(! isset($this->template)) {
            $this->template = Config::get('app.template');
        }
    }

    protected function processResponse($response)
    {
        if (! $response instanceof BaseView) {
            return $response;
        }

        // If the response is returned from the controller action is a View instance
        // and it is not marked as Layout, we will assume we want to render it on the
        // default templated environment, setup via the current controller properties.
        if (is_string($this->layout) && ! $response->isLayout()) {
            $response = Template::make($this->layout, $this->template)->with('content', $response);
        }

        return new Response($response);
    }

    /**
     * @param  string $title
     *
     * @return \Nova\Routing\Controller
     */
    protected function title($title)
    {
        View::share('title', $title);
    }

    /**
     * @return string|null
     */
    protected function getModule()
    {
        if (! isset($this->defaultView)) {
            list(, $caller) = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 2);

            $this->setupDefaultView($caller['function']);
        }

        return $this->module;
    }

    /**
     * Return a default View instance.
     *
     * @return \Nova\View\View
     */
    protected function getView(array $data = array())
    {
        if (! isset($this->defaultView)) {
            list(, $caller) = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 2);

            $this->setupDefaultView($caller['function']);
        }

        return View::make($this->defaultView, $data, $this->module);
    }

    /**
     * @return mixed
     */
    protected function getTemplate()
    {
        return $this->template;
    }

    /**
     * @return mixed
     */
    protected function getLayout()
    {
        return $this->layout;
    }

    /**
     * @return void
     */
    private function setupDefaultView($method)
    {
        // Prepare the View Path using the Controller's full Name including its namespace.
        $classPath = str_replace('\\', '/', static::class);

        if (preg_match('#^App/Controllers/(.*)$#i', $classPath, $matches)) {
            $this->defaultView = $matches[1] .DS .ucfirst($method);
        } else if (preg_match('#^App/Modules/(.+)/Controllers/(.*)$#i', $classPath, $matches)) {
            $this->module = $matches[1];

            $this->defaultView = $matches[2] .DS .ucfirst($method);
        } else {
            throw new BadMethodCallException('Invalid Controller: ' .static::class);
        }
    }

}
