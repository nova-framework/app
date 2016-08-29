<?php
/**
 * Controller - A base Controller which use the Templates and auto-rendering.
 *
 * @author Virgil-Adrian Teaca - virgil@giulianaeassociati.com
 * @version 3.0
 */

namespace App\Core;

use Nova\Http\Response;
use Nova\Routing\Controller as BaseController;
use Nova\Support\Contracts\RenderableInterface as Renderable;
use Nova\Template\Template as Layout;

use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

use Config;
use Template;
use View;

use BadMethodCallException;


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
        if ($response instanceof Renderable) {
            // If the response is returned from the controller action is a View instance
            // and it is not marked as Layout, we will assume we want to render it on the
            // default templated environment, setup via the current controller properties.

            if (is_string($this->layout) && (! $response instanceof Layout)) {
                $response = Template::make($this->layout, $this->template)->with('content', $response);
            }
        }

        if (! $response instanceof SymfonyResponse) {
            $response = new Response($response);
        }

        return $response;
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

        $method = $caller['function'];

        //
        $path = str_replace('\\', '/', static::class);

        if (preg_match('#^App/Controllers/(.*)$#i', $path, $matches)) {
            $view = $matches[1] .'/' .ucfirst($method);

            return View::make($view, $data);
        } else if (preg_match('#^App/Modules/(.+)/Controllers/(.*)$#i', $path, $matches)) {
            $view = $matches[2] .'/' .ucfirst($method);

            return View::make($view, $data, $matches[1]);
        }

        throw new BadMethodCallException('Invalid Controller namespace: ' .static::class);
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
