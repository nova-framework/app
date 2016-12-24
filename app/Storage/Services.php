<?php

return array (
  'providers' => 
  array (
    0 => 'Nova\\Foundation\\Providers\\ForgeServiceProvider',
    1 => 'Nova\\Session\\CommandsServiceProvider',
    2 => 'Nova\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    3 => 'Nova\\Routing\\ControllerServiceProvider',
    4 => 'Nova\\Module\\ModuleServiceProvider',
    5 => 'Nova\\Auth\\AuthServiceProvider',
    6 => 'Nova\\Cache\\CacheServiceProvider',
    7 => 'Nova\\Routing\\RoutingServiceProvider',
    8 => 'Nova\\Cookie\\CookieServiceProvider',
    9 => 'Nova\\Database\\DatabaseServiceProvider',
    10 => 'Nova\\Encryption\\EncryptionServiceProvider',
    11 => 'Nova\\Filesystem\\FilesystemServiceProvider',
    12 => 'Nova\\Hashing\\HashServiceProvider',
    13 => 'Nova\\Language\\LanguageServiceProvider',
    14 => 'Nova\\Log\\LogServiceProvider',
    15 => 'Nova\\Mail\\MailServiceProvider',
    16 => 'Nova\\Database\\MigrationServiceProvider',
    17 => 'Nova\\Pagination\\PaginationServiceProvider',
    18 => 'Nova\\Redis\\RedisServiceProvider',
    19 => 'Nova\\Auth\\Reminders\\ReminderServiceProvider',
    20 => 'Nova\\Database\\SeedServiceProvider',
    21 => 'Nova\\Session\\SessionServiceProvider',
    22 => 'Nova\\Validation\\ValidationServiceProvider',
    23 => 'Nova\\Html\\HtmlServiceProvider',
    24 => 'Nova\\View\\ViewServiceProvider',
    25 => 'Nova\\Layout\\LayoutServiceProvider',
    26 => 'Nova\\Cron\\CronServiceProvider',
  ),
  'eager' => 
  array (
    0 => 'Nova\\Module\\ModuleServiceProvider',
    1 => 'Nova\\Routing\\RoutingServiceProvider',
    2 => 'Nova\\Cookie\\CookieServiceProvider',
    3 => 'Nova\\Database\\DatabaseServiceProvider',
    4 => 'Nova\\Encryption\\EncryptionServiceProvider',
    5 => 'Nova\\Filesystem\\FilesystemServiceProvider',
    6 => 'Nova\\Session\\SessionServiceProvider',
  ),
  'deferred' => 
  array (
    'forge' => 'Nova\\Foundation\\Providers\\ForgeServiceProvider',
    'command.environment' => 'Nova\\Foundation\\Providers\\ForgeServiceProvider',
    'command.session.database' => 'Nova\\Session\\CommandsServiceProvider',
    'command.command.make' => 'Nova\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'command.model.make' => 'Nova\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'composer' => 'Nova\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'command.dump-autoload' => 'Nova\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'command.key.generate' => 'Nova\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'command.up' => 'Nova\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'command.down' => 'Nova\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'command.optimize' => 'Nova\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'command.clear-compiled' => 'Nova\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'command.routes' => 'Nova\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'command.serve' => 'Nova\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'command.tinker' => 'Nova\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'command.controller.make' => 'Nova\\Routing\\ControllerServiceProvider',
    'auth' => 'Nova\\Auth\\AuthServiceProvider',
    'cache' => 'Nova\\Cache\\CacheServiceProvider',
    'cache.store' => 'Nova\\Cache\\CacheServiceProvider',
    'memcached.connector' => 'Nova\\Cache\\CacheServiceProvider',
    'command.cache.clear' => 'Nova\\Cache\\CacheServiceProvider',
    'command.cache.table' => 'Nova\\Cache\\CacheServiceProvider',
    'hash' => 'Nova\\Hashing\\HashServiceProvider',
    'language' => 'Nova\\Language\\LanguageServiceProvider',
    'log' => 'Nova\\Log\\LogServiceProvider',
    'Psr\\Log\\LoggerInterface' => 'Nova\\Log\\LogServiceProvider',
    'command.log.clear' => 'Nova\\Log\\LogServiceProvider',
    'mailer' => 'Nova\\Mail\\MailServiceProvider',
    'swift.mailer' => 'Nova\\Mail\\MailServiceProvider',
    'swift.transport' => 'Nova\\Mail\\MailServiceProvider',
    'migrator' => 'Nova\\Database\\MigrationServiceProvider',
    'migration.repository' => 'Nova\\Database\\MigrationServiceProvider',
    'command.migrate' => 'Nova\\Database\\MigrationServiceProvider',
    'command.migrate.rollback' => 'Nova\\Database\\MigrationServiceProvider',
    'command.migrate.reset' => 'Nova\\Database\\MigrationServiceProvider',
    'command.migrate.refresh' => 'Nova\\Database\\MigrationServiceProvider',
    'command.migrate.install' => 'Nova\\Database\\MigrationServiceProvider',
    'migration.creator' => 'Nova\\Database\\MigrationServiceProvider',
    'command.migrate.make' => 'Nova\\Database\\MigrationServiceProvider',
    'paginator' => 'Nova\\Pagination\\PaginationServiceProvider',
    'redis' => 'Nova\\Redis\\RedisServiceProvider',
    'auth.reminder' => 'Nova\\Auth\\Reminders\\ReminderServiceProvider',
    'auth.reminder.repository' => 'Nova\\Auth\\Reminders\\ReminderServiceProvider',
    'command.auth.reminders' => 'Nova\\Auth\\Reminders\\ReminderServiceProvider',
    'seeder' => 'Nova\\Database\\SeedServiceProvider',
    'command.seed' => 'Nova\\Database\\SeedServiceProvider',
    'validator' => 'Nova\\Validation\\ValidationServiceProvider',
    'html' => 'Nova\\Html\\HtmlServiceProvider',
    'form' => 'Nova\\Html\\HtmlServiceProvider',
    'view' => 'Nova\\View\\ViewServiceProvider',
    'view.finder' => 'Nova\\View\\ViewServiceProvider',
    'view.engine.resolver' => 'Nova\\View\\ViewServiceProvider',
    'layout' => 'Nova\\Layout\\LayoutServiceProvider',
    'cron' => 'Nova\\Cron\\CronServiceProvider',
  ),
  'when' => 
  array (
    'Nova\\Foundation\\Providers\\ForgeServiceProvider' => 
    array (
    ),
    'Nova\\Session\\CommandsServiceProvider' => 
    array (
    ),
    'Nova\\Foundation\\Providers\\ConsoleSupportServiceProvider' => 
    array (
    ),
    'Nova\\Routing\\ControllerServiceProvider' => 
    array (
    ),
    'Nova\\Auth\\AuthServiceProvider' => 
    array (
    ),
    'Nova\\Cache\\CacheServiceProvider' => 
    array (
    ),
    'Nova\\Hashing\\HashServiceProvider' => 
    array (
    ),
    'Nova\\Language\\LanguageServiceProvider' => 
    array (
    ),
    'Nova\\Log\\LogServiceProvider' => 
    array (
    ),
    'Nova\\Mail\\MailServiceProvider' => 
    array (
    ),
    'Nova\\Database\\MigrationServiceProvider' => 
    array (
    ),
    'Nova\\Pagination\\PaginationServiceProvider' => 
    array (
    ),
    'Nova\\Redis\\RedisServiceProvider' => 
    array (
    ),
    'Nova\\Auth\\Reminders\\ReminderServiceProvider' => 
    array (
    ),
    'Nova\\Database\\SeedServiceProvider' => 
    array (
    ),
    'Nova\\Validation\\ValidationServiceProvider' => 
    array (
    ),
    'Nova\\Html\\HtmlServiceProvider' => 
    array (
    ),
    'Nova\\View\\ViewServiceProvider' => 
    array (
    ),
    'Nova\\Layout\\LayoutServiceProvider' => 
    array (
    ),
    'Nova\\Cron\\CronServiceProvider' => 
    array (
    ),
  ),
);
