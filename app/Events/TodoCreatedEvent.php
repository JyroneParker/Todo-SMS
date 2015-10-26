<?php

namespace App\Events;
use App\Todo;
use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class TodoCreatedEvent extends Event
{
    use SerializesModels;

    public $todo;
    public $phone;
    public $timer;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Todo $todo, $phone, $timer)
    {
        //set variables
        $this->todo = $todo;
        $this->phone = $phone;
        $this->timer = $timer;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
