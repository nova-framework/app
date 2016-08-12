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
use Nova\Support\Contracts\RenderableInterface;

use Symfony\Component\HttpFoundation\Request as SymfonyRequest;

use Config;
use Template;
use View;


class Controller extends BaseController
{
    /**
     * The currently used Template.
     *
     * @var string
     */
    protected $template;

    /**
     * The currently used Layout.
     *
     * @var mixed
     */
    protected $layout = 'default';


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
        if (! $response instanceof RenderableInterface) {
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
     * Return a default View instance.
     *
     * @return \Nova\View\View
     *
     * @throw \BadMethodCallException
     */
    protected function getView(array $data = array())
    {
        list(, $caller) = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 2);

        $baseView = ucfirst($caller['function']);

        //
        $classPath = str_replace('\\', '/', static::class);

        if (preg_match('#^App/Controllers/(.*)$#i', $classPath, $matches)) {
            $view = str_replace('/', DS, $matches[1]) .DS .$baseView;

            $module = null;
        } else if (preg_match('#^App/Modules/(.+)/Controllers/(.*)$#i', $classPath, $matches)) {
            $view = str_replace('/', DS, $matches[2]) .DS .$baseView;

            $module = $matches[1];
        } else {
            throw new BadMethodCallException('Invalid Controller namespace: ' .static::class);
        }

        return View::make($view, $data, $module);
    }

    /**
     * @return mixed
     */
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * @return mixed
     */
    public function getLayout()
    {
        return $this->layout;
    }

}
