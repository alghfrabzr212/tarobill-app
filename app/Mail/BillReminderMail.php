<?php

namespace App\Mail;

use App\Models\Bill; // Import model Bill Anda
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BillReminderMail extends Mailable
{
    use Queueable, SerializesModels;

    public $bill; // Properti publik untuk mengakses objek Bill di view email

    /**
     * Create a new message instance.
     */
    public function __construct(Bill $bill)
    {
        $this->bill = $bill;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            // Subject dari email yang akan dikirim
            subject: 'Reminder: Tagihan ' . $this->bill->nama_tagihan . ' Jatuh Tempo Besok!',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        // Tentukan view Blade yang akan menjadi konten email
        // Ini akan mencari file resources/views/emails/bill_reminder.blade.php
        return new Content(
            markdown: 'emails.bill_reminder', // Menggunakan Markdown Mailable template
            // Jika ingin menggunakan Blade biasa, ganti dengan: view: 'emails.bill_reminder',
            with: [
                'bill' => $this->bill, // Mengirim objek $bill ke view
                'userName' => $this->bill->user->name ?? 'Pengguna', // Mengambil nama user dari relasi, atau 'Pengguna' jika null
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return []; // Kosong, karena tidak ada lampiran
    }
}