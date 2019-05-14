<?php


return array(
    // The PDO Fetch Style.
    'fetch' => PDO::FETCH_CLASS,

    // The Default Database Connection Name.
    'default' => 'mysql',

    // The Database Connections.
    'connections' => array(
        'sqlite' => array(
            'driver'    => 'sqlite',
            'database'  => BASEPATH .'storage' .DS .'database.sqlite',
            'prefix'    => '',
        ),
        'mysql' => array(
            'driver'    => 'mysql',
            'hostname'  => 'localhost',
            'database'  => 'nova',
            'username'  => 'nova',
            'password'  => 'password',
            'prefix'    => PREFIX,
            'charset'   => 'utf8',
            'collation' => 'utf8_general_ci',
        ),
        'pgsql' => array(
            'driver'   => 'pgsql',
            'host'     => 'localhost',
            'database' => 'nova',
            'username' => 'nova',
            'password' => 'password',
            'charset'  => 'utf8',
            'prefix'   => PREFIX,
            'schema'   => 'public',
        ),
    ),

    // Migration Repository Table
    'migrations' => 'migrations',
);
