<?php

namespace App\Providers;

use Nova\Routing\Router;
use Nova\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;


class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * @var string
     */
    protected $namespace = 'App\Controllers';


    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  \Nova\Routing\Router  $router
     * @return void
     */
    public function boot(Router $router)
    {
        parent::boot($router);

        //
        $this->registerAssetRoutes();
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Nova\Routing\Router  $router
     * @return void
     */
    public function map(Router $router)
    {
        $path = app_path('Routes');

        $router->group(array('prefix' => 'api', 'middleware' => 'api', 'namespace' => $this->namespace), function ($router) use ($path)
        {
            require $path .DS .'Api.php';
        });

        $router->group(array('middleware' => 'web', 'namespace' => $this->namespace), function ($router) use ($path)
        {
            require $path .DS .'Web.php';
        });
    }


    /**
     * Define the asset routes for the application.
     *
     * @return void
     */
    protected function registerAssetRoutes()
    {
        $dispatcher = $this->app['assets.dispatcher'];

        require app_path('Routes') .DS .'Assets.php';
    }
}
