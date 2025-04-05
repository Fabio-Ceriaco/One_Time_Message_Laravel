<?php

namespace App\Mail;


use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;


class email_readed_message extends Mailable
{


    /**
     * Create a new message instance.
     */
    public $datetime_readed;
    public $email_receiver;
    public function __construct($datetime_readed, $email_receiver)
    {
        $this->datetime_readed = $datetime_readed;
        $this->email_receiver = $email_receiver;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'One Time Message - Message readed. ' . $this->email_receiver,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.email_readed_message',
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
