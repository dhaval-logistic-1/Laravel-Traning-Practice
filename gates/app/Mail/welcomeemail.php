<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class welcomeemail extends Mailable
{
    use Queueable, SerializesModels;

    public $request;
    public $filename;
   


    /**
     * Create a new message instance.
     */
    public function __construct($request , $filename )
    {
        $this->request = $request;
        $this->filename = $filename;
       
    }   

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject:  "Contact Form Submission",
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.welcome_mail',
            
            // text: "mail.welcome_mail"
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        $file = [];

        if ($this->filename) {
            $file = [
                Attachment::fromPath(public_path('uploads/' . $this->filename))
                    
            ];
        }  
        return $file;     
    }
}
