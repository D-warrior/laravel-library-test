<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ApprovedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $book;
    public $returnDate;

    public function __construct($user, $book, $returnDate)
    {
        $this->user = $user;
        $this->book = $book;
        $this->returnDate = $returnDate;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Your Book Borrow Request is Approved',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.approved',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
