<?php

defined('DS') || define('DS', DIRECTORY_SEPARATOR);

//--------------------------------------------------------------------------
// Define the absolute paths for Application directories
//--------------------------------------------------------------------------

define('APPDIR', realpath(__DIR__.'/../app/') .DS);
define('PUBLICDIR', realpath(__DIR__) .DS);
define('ROOTDIR', realpath(__DIR__.'/../') .DS);

//--------------------------------------------------------------------------
// APPLICATION ENVIRONMENT
//--------------------------------------------------------------------------
/*
You can load different configurations depending on your current environment.
Setting the environment also influences things like logging and error reporting.

This can be set to anything, but default usage is:

    development
    production
*/

define('ENVIRONMENT', 'development');

//--------------------------------------------------------------------------
//  Check the Composer installation
//--------------------------------------------------------------------------

if (! file_exists(ROOTDIR .'vendor/autoload.php')) {
    die("<h1>Please install via composer.json</h1>
<p>Install Composer instructions: <a href='https://getcomposer.org/doc/00-intro.md#globally'>https://getcomposer.org/doc/00-intro.md#globally</a></p>
<p>Once composer is installed, navigate to the working directory in your terminal/command prompt and enter 'composer install'</p>");
}

//--------------------------------------------------------------------------
// Load the Composer Autoloader
//--------------------------------------------------------------------------

require ROOTDIR .'vendor/autoload.php';

//--------------------------------------------------------------------------
// Bootstrap the Framework and get the Application instance
//--------------------------------------------------------------------------

$app = require_once APPDIR .'Boot' .DS .'Start.php';

//--------------------------------------------------------------------------
// Run the Application
//--------------------------------------------------------------------------

$app->run();
