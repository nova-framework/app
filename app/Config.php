<?php

/**
 * Config - the Global Configuration loaded BEFORE the Nova Application starts.
 */


/**
 * Define the path to Storage.
 *
 * NOTE: in a multi-tenant design, every application should have its unique Storage.
 */
define('STORAGE_PATH', BASEPATH .'storage' .DS);

/**
 * Define the global prefix.
 *
 * PREFER to be used in Database calls or storing Session data, default is 'nova_'
 */
define('PREFIX', 'nova_');
