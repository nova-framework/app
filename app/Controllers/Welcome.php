<?php
/**
 * Welcome controller
 *
 * @author David Carr - dave@novaframework.com
 * @version 3.0
 */

namespace App\Controllers;

use Nova\Routing\Controller;

use Config;
use Language;
use Route;
use Session;
use View;

/**
 * Sample controller showing a construct and 2 methods and their typical usage.
 */
class Welcome extends Controller
{
    protected $template = 'Default';
    protected $layout   = 'default';


    /**
     * Call the parent construct
     */
    public function __construct()
    {
        //
    }

    /**
     * Create and return a proper View instance.
     */
    public function index()
    {
        $data['welcomeMessage'] = __('Hello, welcome from the welcome controller! <br/>
This content can be changed in <code>/app/Views/Welcome/Welcome.php</code>');

        return View::make('Welcome/Welcome', $data)->shares('title', __('Welcome'));
    }

    /**
     * Create and return a proper View instance.
     */
    public function subPage()
    {
        $title = __('Subpage');

        $message = __('Hello, welcome from the welcome controller and subpage method! <br/>
This content can be changed in <code>/app/Views/Welcome/SubPage.php</code>');

        return View::make('Welcome/SubPage')
            ->shares('title', $title)
            ->withWelcomeMessage($message);
    }
}
