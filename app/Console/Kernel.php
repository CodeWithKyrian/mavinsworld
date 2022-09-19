<?php

namespace App\Console;

use Dymantic\InstagramFeed\Profile;
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
        // $schedule->command('inspire')->hourly();

        $schedule->command('queue:restart')
            ->everyFiveMinutes();

        $schedule->command('queue:work --max-time=60')
            ->everyMinute()
            ->withoutOverlapping()
            ->sendOutputTo(storage_path('/logs/queue-jobs.log'));

        $schedule->command('model:prune')->daily();

        $schedule->command("instagram-feed:refresh-tokens")->monthly();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
