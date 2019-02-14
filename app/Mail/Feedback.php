<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Feedback extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * @var string|null
     */
    public $email_phone;
    /**
     * @var string|null
     */
    public $name;
    /**
     * @var string|null
     */
    public $comment;

    /**
     * Create a new message instance.
     *
     * @param string|null $email_phone
     * @param string|null $name
     * @param string|null $comment
     */
    public function __construct(string $email_phone = null, string $name  = null, string $comment = null)
    {
        $this->email_phone = $email_phone ?? '';
        $this->name = $name ?? '';
        $this->comment = $comment ?? '';
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Contacts Form Notification')
            ->markdown('emails.feedback');
    }
}
