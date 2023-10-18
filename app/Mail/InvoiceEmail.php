<?php

namespace App\Mail;

use App\Models\User;
use App\Models\Pesanan;
use App\Models\PaketWisata;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class InvoiceEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $user;
    public $paketWisata;

    public function __construct(Pesanan $order, User $user, PaketWisata $paketWisata)
    {
        $this->order = $order;
        $this->user = $user;
        $this->paketWisata = $paketWisata;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Invoice Email',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.invoice',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
