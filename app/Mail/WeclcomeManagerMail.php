<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class WeclcomeManagerMail extends Mailable
{
    use Queueable, SerializesModels;

    public $mailsubject;
    public $mailEmail;
    public $mailUsername;
    public $mailPassword;
    public $leadname;
    public $managername;

    /**
     * Create a new message instance.
     */
    public function __construct($subject, $emailAddress, $username, $password, $leadname = null, $managername = null)
    {
        $this->mailsubject = $subject;
        $this->mailEmail = $emailAddress;
        $this->mailUsername = $username;
        $this->mailPassword = $password;
        if (!is_null($leadname)) {
            $this->leadname = $leadname;
        }
        if (!is_null($managername)) {
            $this->managername = $managername;
        }
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->mailsubject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'Mail.add-manager-mail',
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
