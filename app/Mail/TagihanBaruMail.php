<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Bill;

class TagihanBaruMail extends Mailable
{
    use Queueable, SerializesModels;

    public $tagihan;

    public function __construct(Bill $tagihan)
    {
        $this->tagihan = $tagihan;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Tagihan Baru dari Taro Bill',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.tagihan-baru',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
