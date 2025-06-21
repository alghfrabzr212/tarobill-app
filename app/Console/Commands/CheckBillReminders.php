<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Bill; // Import model Bill
use App\Mail\BillReminderMail; // Import mailable
use Illuminate\Support\Facades\Mail; // Import Mail Facade
use Carbon\Carbon; // Import Carbon untuk manipulasi tanggal

class CheckBillReminders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bills:check-reminders'; // Nama command yang akan dipanggil

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Checks for bills due tomorrow and sends reminder emails.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Tanggal besok dari sekarang
        $tomorrow = Carbon::now()->addDay()->format('Y-m-d');
        $this->info('Mengecek tagihan yang jatuh tempo besok: ' . $tomorrow); // Log untuk debugging

        // Ambil tagihan yang:
        // 1. Jatuh tempo besok
        // 2. Statusnya BUKAN 'Lunas'
        // 3. Kolom email_reminder_sent_at-nya masih NULL (belum pernah dikirim)
        $billsToRemind = Bill::with('user') // Penting untuk memuat relasi user
            ->whereDate('tanggal_jatuh_tempo', $tomorrow)
            ->where('status', '!=', 'Lunas')
            ->whereNull('email_reminder_sent_at')
            ->get();

        if ($billsToRemind->isEmpty()) {
            $this->info('Tidak ada tagihan yang perlu diingatkan untuk besok.');
            return Command::SUCCESS;
        }

        $this->info("Menemukan " . $billsToRemind->count() . " tagihan yang jatuh tempo besok.");

        foreach ($billsToRemind as $bill) {
            // Pastikan user dan emailnya ada sebelum mencoba mengirim
            if ($bill->user && $bill->user->email) {
                try {
                    Mail::to($bill->user->email)->send(new BillReminderMail($bill));

                    // Jika berhasil dikirim, update kolom email_reminder_sent_at
                    $bill->update(['email_reminder_sent_at' => Carbon::now()]);

                    $this->info("Reminder untuk tagihan '{$bill->nama_tagihan}' (ID: {$bill->id}) berhasil dikirim ke {$bill->user->email}.");
                } catch (\Exception $e) {
                    $this->error("Gagal mengirim reminder untuk tagihan '{$bill->nama_tagihan}' (ID: {$bill->id}) ke {$bill->user->email}: " . $e->getMessage());
                }
            } else {
                $this->warn("Tagihan '{$bill->nama_tagihan}' (ID: {$bill->id}) tidak memiliki user atau email.");
            }
        }

        $this->info('Pengecekan reminder tagihan selesai.');
        return Command::SUCCESS;
    }
}