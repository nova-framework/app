<?php

/**
 * Console - register the Forge Commands and Schedule
 */


/**
 * Resolve the Forge commands from application.
 */
Forge::resolveCommands(array(
    //'App\Console\Commands\MagicWand',
));


/**
 * Add the Closure based commands.
 */
Forge::command('app:install', function ()
{
    $this->call('migrate', array('--seed' => true));

    //
    $this->call('package:migrate');
    $this->call('package:seed');

})->describe('Run all database migrations and seed it with records');


Forge::command('queue:monitor', function ()
{
    $path = storage_path('queue.pid');

    if (is_readable($path) && ! empty($result = file_get_contents($path))) {
        $command = sprintf("ps -p %d --no-heading | awk '{print $1}'", $pid = (int) $result);

        if (! empty($result = exec($command)) && ($pid == (int) $result)) {
            return;
        }
    }

    $command = sprintf('%s %s queue:work --daemon --tries=3 >/dev/null & echo $!', PHP_BINARY, base_path('forge'));

    // Store the Queue Worker PID for later checking.
    file_put_contents($path, exec($command));

})->describe('Monitor the Queue Worker execution');


/**
 * Schedule the Queue execution.
 */
//Schedule::command('queue:monitor')->everyMinute();

//Schedule::command('queue:work --daemon --tries=3')->everyMinute()->withoutOverlapping()->runInBackground();
