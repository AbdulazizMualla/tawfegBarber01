<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReservationCancelMail extends Mailable
{
    use Queueable, SerializesModels;
    public $message = 'نعتذر لإلغاء حجزك بسبب ظرف طارئ أرجوا حجز موعد جديد وشكراً';
    public $subject;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->subject = config('app.name');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.reservation-cancel');
    }
}
