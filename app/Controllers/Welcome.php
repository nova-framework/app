<?php
/**
 * Welcome controller
 *
 * @author David Carr - dave@novaframework.com
 * @version 3.0
 */

namespace App\Controllers;

use Nova\Core\View;
use Nova\Core\Controller;

use Language;
use Router;
use Session;

/**
 * Sample controller showing a construct and 2 methods and their typical usage.
 */
class Welcome extends Controller
{
    protected $code;

    /**
     * Call the parent construct
     */
    public function __construct()
    {
        parent::__construct();

        // Setup the Controller's Language code.
        $this->code = Language::code();
    }

    protected function before()
    {
        // Process the Multi-Language.
        $language = Router::getLanguage();

        // Adjust the Controller's Language.
        if($language != $this->code) {
            $this->code = $language;
        }

        // Leave to parent's method the Execution Flow decisions.
        return parent::before();
    }

    /**
     * Create and return a proper View instance.
     */
    public function index()
    {
        $data['title'] = __('Welcome');
        $data['welcomeMessage'] = __('Hello, welcome from the welcome controller! <br/>
This content can be changed in <code>/app/Views/Welcome/Welcome.php</code>');

        return View::make('Welcome/SubPage', $data);
    }

    /**
     * Create and return a proper View instance.
     */
    public function subPage()
    {
        $message = __('Hello, welcome from the welcome controller and subpage method! <br/>
This content can be changed in <code>/app/Views/Welcome/SubPage.php</code>');

        return View::make('Welcome/SubPage')
            ->shares('title', __('Subpage'))
            ->withWelcomeMessage($message);
    }

}
