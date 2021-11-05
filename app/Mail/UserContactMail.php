<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserContactMail extends Mailable
{
    use Queueable, SerializesModels;
    public $reply;
    public $subject;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($reply)
    {
       $this->reply = $reply;
        $this->subject = config('app.url');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.user-contact');
    }
}
