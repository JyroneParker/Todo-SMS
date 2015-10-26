<?php

namespace App\Listeners;
use Mail;
use App\Events\TodoCreatedEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\DispatchesJobs;
use App\Jobs\SendText;
class TodoCreatedListener implements ShouldQueue
{
  use DispatchesJobs;
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
      $job = (new SendText($text,$event->phone))->delay($event->timer);
        $this->dispatch($job);

    }
}
