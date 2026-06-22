<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ReturnedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $book;

    public function __construct($user, $book)
    {
        $this->user = $user;
        $this->book = $book;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Your Book Has Been Returned',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.returned',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
