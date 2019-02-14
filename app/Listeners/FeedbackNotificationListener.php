<?php

namespace App\Listeners;

use App\Events\FeedbackNotification;
use App\Mail\Feedback;
use Log;
use Mail;

class FeedbackNotificationListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  FeedbackNotification  $event
     * @return void
     */
    public function handle(FeedbackNotification $event)
    {
        Log::error('start');
        try {
            Mail::to(env('MAIL_FROM_TO'))->send(new Feedback($event->email_phone, $event->name, $event->comment));
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }
    }
}
