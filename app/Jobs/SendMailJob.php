<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Mail\SendMail;

class SendMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     *
     * @var string|array
     */
    public $view, $email, $subject, $data;

    /**
     * Create a new job instance.
     *
     * @param string $view
     * @param string email
     * @param string $subject
     * @param array $data
     * @return void
     */
    public function __construct($view, $email, $subject, $data)
    {
        $this->view = $view;
        $this->email = $email;
        $this->subject = $subject;
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $sendMail = new SendMail();
        $sendMail::sendMail($this->view, $this->email, $this->subject, $this->data);
    }
}
