<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // Tempatkan jadwal command Anda di sini
        // Contoh untuk command bills:check-reminders:
        $schedule->command('bills:check-reminders')->dailyAt('00:01');
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands'); // Ini akan memuat semua command dari folder Commands

        require base_path('routes/console.php');
    }
}