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
    /**
     * Call the parent construct
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Create and return a proper View instance.
     */
    public function index()
    {
        $data['welcomeMessage'] = $this->trans('Hello, welcome from the welcome controller! <br/>
This content can be changed in <code>/app/Views/Welcome/Welcome.php</code>');

        return View::make('Welcome/Welcome', $data)->shares('title', $this->trans('Welcome'));
    }

    /**
     * Create and return a proper View instance.
     */
    public function subPage()
    {
        $title = $this->trans('Subpage');

        $message = $this->trans('Hello, welcome from the welcome controller and subpage method! <br/>
This content can be changed in <code>/app/Views/Welcome/SubPage.php</code>');

        return View::make('Welcome/SubPage')
            ->shares('title', $title)
            ->withWelcomeMessage($message);
    }

    protected function trans($message, $args = null)
    {
        if (! $message) return '';

        //
        $params = (func_num_args() === 2) ? (array) $args : array_slice(func_get_args(), 1);

        if(Config::get('app.multilingual', false)) {
            $code = Route::getLanguage();
        } else {
            $code = Config::get('app.locale');
        }

        return Language::instance('app', $code)->translate($message, $params);
    }
}
