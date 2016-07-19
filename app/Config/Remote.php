<?php
/**
 * Remote
 *
 * @author Virgil-Adrian Teaca - virgil@giulianaeassociati.com
 * @version 3.0
 */

use Nova\Config\Config;


/**
 * Setup the Remote configuration
 */
Config::set('remote', array(
    //--------------------------------------------------------------------------
    // Default Remote Connection Name
    //--------------------------------------------------------------------------

    'default' => 'production',

    //--------------------------------------------------------------------------
    // Remote Server Connections
    //--------------------------------------------------------------------------

    'connections' => array(
        'production' => array(
            'host'      => '',
            'username'  => '',
            'password'  => '',
            'key'       => '',
            'keyphrase' => '',
            'root'      => '/var/www',
        ),
    ),

    //--------------------------------------------------------------------------
    // Remote Server Groups
    //--------------------------------------------------------------------------

    'groups' => array(
        'web' => array('production')
    ),
));
