<?php

namespace App\Listeners;
use Mail;
use App\Events\TodoCreatedEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class TodoCreatedListener
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
     * @param  TodoCreatedEvent  $event
     * @return void
     */
    public function handle(TodoCreatedEvent $event)
    {
        //set todo
        $text = $event->todo->content;
        Mail::raw($text, function ($message) {
    $message->from(env('MAIL_USERNAME'), 'Todo');

    $message->to(env('PHONE'));
});
    }
}
