<?php
/**
 * Queue
 *
 * @author Virgil-Adrian Teaca - virgil@giulianaeassociati.com
 * @version 3.0
 */

use Nova\Config\Config;


Config::set('queue', array(
    /*
    |--------------------------------------------------------------------------
    | Default Queue Driver
    |--------------------------------------------------------------------------
    |
    | The Nova queue API supports a variety of back-ends via an unified
    | API, giving you convenient access to each back-end using the same
    | syntax for each one. Here you may set the default queue driver.
    |
    | Supported: "sync", "beanstalkd", "sqs", "iron", "redis"
    |
    */

    'default' => 'sync',

    //--------------------------------------------------------------------------
    // Queue Connections
    //--------------------------------------------------------------------------

    'connections' => array(
        'sync' => array(
            'driver' => 'sync',
        ),
        'beanstalkd' => array(
            'driver' => 'beanstalkd',
            'host'   => 'localhost',
            'queue'  => 'default',
            'ttr'    => 60,
        ),
        'sqs' => array(
            'driver' => 'sqs',
            'key'    => 'your-public-key',
            'secret' => 'your-secret-key',
            'queue'  => 'your-queue-url',
            'region' => 'us-east-1',
        ),
        'iron' => array(
            'driver'  => 'iron',
            'host'    => 'mq-aws-us-east-1.iron.io',
            'token'   => 'your-token',
            'project' => 'your-project-id',
            'queue'   => 'your-queue-name',
            'encrypt' => true,
        ),
        'redis' => array(
            'driver' => 'redis',
            'queue'  => 'default',
        ),
    ),

    //--------------------------------------------------------------------------
    // Failed Queue Jobs
    //--------------------------------------------------------------------------

    'failed' => array(
        'database' => 'mysql',
        'table' => 'failed_jobs',
    ),
));
