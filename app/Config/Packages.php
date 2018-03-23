<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | Author Information For Package Generation
    |--------------------------------------------------------------------------
    |
    */

    'author' => array(
        'name'     => 'John Doe',
        'email'    => 'john.doe@novaframework.dev',
        'homepage' => 'http://novaframework.dev',
    ),

    //--------------------------------------------------------------------------
    // Path To The Cache File
    //--------------------------------------------------------------------------

    'cache' => STORAGE_PATH .'framework' .DS .'packages.php',

    /*
    |---------------------------------------------------------------------------
    | Modules Configuration
    |---------------------------------------------------------------------------
    |
    |*/

    'modules' => array(

        //----------------------------------------------------------------------
        // Path to Modules
        //----------------------------------------------------------------------

        'path' => BASEPATH .'modules',

        //----------------------------------------------------------------------
        // Modules Base Namespace
        //----------------------------------------------------------------------

        'namespace' => 'Modules\\',
    ),

    /*
    |--------------------------------------------------------------------------
    | Themes Configuration
    |--------------------------------------------------------------------------
    |
    */

    'themes' => array(

        //----------------------------------------------------------------------
        // Path to Themes
        //----------------------------------------------------------------------

        'path' => BASEPATH .'themes',

        //----------------------------------------------------------------------
        // Themes Base Namespace
        //----------------------------------------------------------------------

        'namespace' => 'Themes\\',
    ),

    /*
    |---------------------------------------------------------------------------
    | Loading Options For The Installed Packages
    |---------------------------------------------------------------------------
    |
    */

    'options' => array(
        /*
        'blog' => array(
            'enabled'  => true,
            'order'    => 9001,
        ),
        */
    ),

);
