<?php

/**
 * Console - register the Forge Commands and Schedule
 *
 * @author Virgil-Adrian Teaca - virgil@giulianaeassociati.com
 * @version 3.0
 *
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
Forge::command('queue:monitor', function ()
{
    $runCommand = true;

    // Check if the Queue Worker is already running.
    $path = storage_path('queue.pid');

    if (is_readable($path) && ! empty($pid = file_get_contents($path))) {
        $command = "ps -p {$pid} --no-heading | awk '{print $1}'";

        if (! empty($result = exec($command))) {
            $runCommand = false;
        }
    }

    if ($runCommand) {
        $command = sprintf('%s %s queue:work --daemon --tries=3 >/dev/null & echo $!', PHP_BINARY, base_path('forge'));

        $pid = exec($command);

        // Store the Queue Worker PID for later checking.
        file_put_contents($path, $pid);
    }

})->describe('Monitor the Queue Worker execution');


/**
 * Schedule the Queue execution.
 */
//Schedule::command('queue:monitor')->everyMinute();

//Schedule::command('queue:work --daemon --tries=3')->everyMinute()->withoutOverlapping()->runInBackground();
