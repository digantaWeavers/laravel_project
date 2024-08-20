<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ProjectCreatedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $managerName;
    public $projectName;
    public $clientName;
    public $techonology;
    public $endDate;
    public $superAdminName;

    /**
     * Create a new message instance.
     */
    public function __construct($managerName, $projectName, $clientName, $techonology, $endDate, $superAdminName)
    {
        $this->managerName = $managerName;
        $this->projectName = $projectName;
        $this->clientName = $clientName;
        $this->techonology = $techonology;
        $this->endDate = $endDate;
        $this->superAdminName = $superAdminName;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Project Assigned',
        );
    }

    // public function build()
    // {
    //     return $this->subject('New Project Assigned')
    //                 ->view('Mail.project_assign')
    //                 ->with([
    //                     'projectName' => $this->project->project_name,
    //                     'clientName' => $this->project->client_name,
    //                     'endDate' => $this->project->enddate,
    //                 ]);
    // }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'Mail.project_assign',
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
