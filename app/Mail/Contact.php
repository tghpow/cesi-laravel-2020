<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Contact extends Mailable
{
    use Queueable, SerializesModels;

    public $contact;

    /**
     * Create a new message instance.
     * @param \App\Models\Contact $contact
     */
    public function __construct(\App\Models\Contact $contact)
    {
        $this->contact = $contact;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Nouveau contact pour ' . $this->contact->subject)
            ->view('emails.contact');
    }
}
