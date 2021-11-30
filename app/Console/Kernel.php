<?php

namespace App\Console;

use App\Mail\SendEmailMail;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Mail;

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
        // $schedule->command('inspire')->hourly();
        Mail::to('amgad74@hotmail.com')->send(new SendEmailMail(['subject' => 'crontab' , 'message' => 'it is run now']));
        $schedule->command('queue:work')->everyMinute();
        $schedule->command('queue:restart')->everyFiveMinutes();
        $schedule->command('reservations:get')->everyMinute();
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
