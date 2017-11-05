<?php

namespace App\Controllers;

use Nova\Support\Facades\View;
use Nova\Support\Str;

use App\Controllers\BaseController;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


class Pages extends BaseController
{
    /**
     * The currently used Theme.
     *
     * @var string
     */
    protected $theme = false; // Disable the support for Themes.

    /**
     * The currently used Layout.
     *
     * @var string
     */
    protected $layout = 'Static';


    public function display($slug = null)
    {
        $path = explode('/', $slug ?: 'home');

        // Compute the used variables.
        list ($page, $subpage) = array_pad($path, 2, null);

        // Compute the full View name, i.e. 'about-us' -> 'Pages/AboutUs'
        array_unshift($path, 'pages');

        $view = implode('/', array_map(function ($value)
        {
            return Str::studly($value);

        }, $path));

        if (! View::exists($view)) {
            // We will look for the Home view before to go Exception.
            if (! View::exists($view = $view .'/Home')) {
                throw new NotFoundHttpException($view);
            }
        }

        $title = Str::title(
            str_replace(array('-', '_'), ' ', $subpage ?: ($page ?: 'home'))
        );

        return View::make($view, compact('page', 'subpage'))
            ->shares('title', $title);
    }
}
