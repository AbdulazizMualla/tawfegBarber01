<?php

namespace App\Jobs;

use App\Mail\SendEmailMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendMails implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $emails;
    public $content;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($emails , $content)
    {
        $this->emails = $emails;
        $this->content = $content;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach ($this->emails as $email){
            Mail::to($email->email)->send(new SendEmailMail($this->content));
        }
    }
}
