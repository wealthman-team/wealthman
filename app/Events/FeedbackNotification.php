<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class FeedbackNotification
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
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
     * FeedbackNotification constructor.
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
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return [];
    }
}
