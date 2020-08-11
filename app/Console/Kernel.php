<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Cron;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('inspire')
                 ->everyMinute();

        // $schedule->command('db:wipe --force')->everyFiveMinutes()
        // ->when(function(){
        //                  return Cron::shouldIRun('db:wipe --force', 2);;
        //          });
        // $schedule->command('command:test')->everyMinute();
    //     $schedule->command('down')
    //                     ->everyMinute()
    //                     ->when(function(){
    //                         return Cron::shouldIRun('down', 2);;
    //             });
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');

    }
}
