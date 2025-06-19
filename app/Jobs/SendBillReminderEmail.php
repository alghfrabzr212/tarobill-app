<?php

namespace App\Jobs;

use App\Models\Bill;
use App\Mail\TagihanBaruMail;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendBillReminderEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function handle(): void
    {
        $tomorrow = now()->addDay()->toDateString();

        $bills = Bill::with('user')
            ->whereDate('tanggal_jatuh_tempo', $tomorrow)
            ->where('status', '!=', 'Lunas')
            ->get();

        foreach ($bills as $bill) {
            if ($bill->user && $bill->user->email) {
                Mail::to($bill->user->email)->send(new TagihanBaruMail($bill));
            }
        }
    }
}
