<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BookRequestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $book;
    public $nbreJour;

    public function __construct($user, $book, $nbreJour)
    {
        $this->user = $user;
        $this->book = $book;
        $this->nbreJour = $nbreJour;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Your Book Borrow Request is Pending',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.request',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
