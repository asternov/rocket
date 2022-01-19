<?php

namespace App\Console;

use App\Console\Commands\RocketSetOnline;
use App\Console\Commands\RocketTestOnline;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
         $schedule->command(RocketSetOnline::class)->between('5:00', '16:00')->everyMinute();
         $schedule->command(RocketTestOnline::class)->between('5:00', '16:00')->everyMinute();
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
