<?php

namespace App\Listeners;

use App\Events\SendUserContractToEmailEvent;
use App\Mail\SendUserContractEmailNotification;
use Illuminate\Support\Facades\Mail;

class SendUserContractToEmailListener
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
     * @param  \App\Events\SendUserContractToEmailEvent  $event
     * @return void
     */
    public function handle(SendUserContractToEmailEvent $event)
    {
        Mail::to($event->data->mail_to)->send(
            new SendUserContractEmailNotification(
                $event->data->id,
                $event->data->name,
                $event->data->email,
                $event->data->description,
                $event->data->file_path,
                $event->data->file_name,
            ));
    }
}
