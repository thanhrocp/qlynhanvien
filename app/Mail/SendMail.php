<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('view.name');
    }

    /**
     * Handle send mail
     *
     * @param string $view
     * @param string $email
     * @param string $subject
     * @param array $data
     * @return void
     */
    public static function sendMail(string $view, string $email, string $subject, array $data)
    {
        Mail::send($view, $data, function ($message) use ($email, $subject) {
            $message->to($email)->subject($subject);
        });
    }
}
